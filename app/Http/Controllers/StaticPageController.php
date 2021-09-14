<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function about ()
    {
        return view('static.about');
    }
    public function feedback()
    {
        return view('static.feedback');
    }
    public function dataRequestForm()
    {
        return view('static.dataRequestForm');
    }
}
