<?php

namespace App\Http\Controllers\Back;

use App\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SettingsController extends Controller
{
    public function index()
    {
        return view('back.settings.index')->with([
            'models' => Settings::all()
        ]);
    }

    public function edit($id)
    {
        return view('back.settings.edit')->with([
            'model' => Settings::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = Settings::find($id);
        $model->fill($request->only(['value']));

        $model->save();

        return redirect()->route('settings.index')->withSuccess('Successfully updated!');
    }
}
