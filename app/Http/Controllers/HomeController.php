<?php

namespace App\Http\Controllers;
use App\Models\Departments;
use App\Models\Faqs;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function education()
    {
        $result['latestNews'] = News::where('status', 1)->where('latest_news', 1)->get();
        $result['departments'] = Departments::where('status', 1)->get();
        $result['faqs'] = Faqs::where('status', 1)->get();
        $result['news'] = News::where('status', 1)->get();
        return view('education.home', $result);
    }
    
    

    public function entertainment()
    {
        return view('entertainment');
    }
}



