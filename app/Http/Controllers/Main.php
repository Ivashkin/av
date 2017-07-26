<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Slider;
use Illuminate\Routing\Controller as BaseController;

class Main extends BaseController
{
    public function index()
    {
        return view('main')->with([
            'catalog' => Catalog::active()->get(),
            'slider' => Slider::active()->get(),
        ]);
    }

    public function catalog($alias)
    {
        return view('catalog');
    }
}
