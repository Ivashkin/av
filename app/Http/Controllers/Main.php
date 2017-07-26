<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Main extends BaseController
{
    public function index()
    {
        return view('main');
    }

    public function catalog()
    {
        return view('catalog');
    }
}
