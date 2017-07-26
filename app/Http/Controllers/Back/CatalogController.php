<?php

namespace App\Http\Controllers\Back;

use App\Catalog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CatalogController extends Controller
{
    public function index()
    {
        return view('back.catalog.index')->with([
            'models' => Catalog::query()->get()
        ]);
    }

    public function create()
    {
        return view('back.catalog.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'alias' => 'required|max:255',
                'image' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $model = new Catalog($validator->getData());

        if ($model->save()) {

            $model->checkAndSaveThumbnail($request);

            return redirect()->route('catalog.index')->with(['message' => 'Successfully created!']);
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'Undefined error']);
        }

    }

    public function edit($id)
    {
        return view('back.catalog.edit')->with([
            'model' => Catalog::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'alias' => 'required|max:255',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $model = Catalog::find($id);
        $model->fill($request->only(['title', 'alias', 'description', 'disabled']));

        if ($model->save()) {
            $model->checkAndSaveThumbnail($request);
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'Undefined error']);
        }

        return redirect()->route('catalog.edit', $model)->withSuccess('Successfully updated!');
    }

    public function destroy($id)
    {
        $model = Catalog::find($id);
        if ($model) {
            $model->delete();
        }

        return redirect()->route('catalog.index')->with(['message' => 'Successfully deleted!']);
    }
}
