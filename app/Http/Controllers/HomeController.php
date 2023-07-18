<?php

namespace App\Http\Controllers;
use App\Models\Faqs;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function education()
    {
        $result['faqs'] = Faqs::where('status', 1)->get();
        return view('education.home', $result);
    }
    

    public function entertainment()
    {
        return view('entertainment');
    }
}



