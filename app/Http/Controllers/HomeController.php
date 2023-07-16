<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function education()
    {
        return view('education');
    }

    public function entertainment()
    {
        return view('entertainment');
    }
}



