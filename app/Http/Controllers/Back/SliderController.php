<?php

namespace App\Http\Controllers\Back;

use App\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SliderController extends Controller
{
    public function index()
    {
        return view('back.slider.index')->with([
            'models' => Slider::all()
        ]);
    }

    public function create()
    {
        return view('back.slider.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $model = new Slider($validator->getData());

        if ($model->save()) {

            $model->checkAndSaveThumbnail($request);

            return redirect()->route('slider.index')->with(['message' => 'Successfully created!']);
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'Undefined error']);
        }

    }

    public function edit($id)
    {
        return view('back.slider.edit')->with([
            'model' => Slider::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = Slider::find($id);
        $model->fill($request->only(['title', 'disabled']));

        if ($model->save()) {
            $model->checkAndSaveThumbnail($request);
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'Undefined error']);
        }

        return redirect()->route('slider.edit', $model)->withSuccess('Successfully updated!');
    }

    public function destroy($id)
    {
        $model = Slider::find($id);
        if ($model) {
            $model->delete();
        }

        return redirect()->route('slider.index')->with(['message' => 'Successfully deleted!']);
    }
}
