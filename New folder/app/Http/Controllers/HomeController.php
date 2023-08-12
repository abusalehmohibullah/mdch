<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Sections;
use App\Models\Faqs;
use App\Models\News;
use App\Models\Albums;
use App\Models\Administrations;
use App\Models\Media;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function education()
    {
        $result['latestNews'] = News::where('status', 1)->where('latest_news', 1)->orderBy('published_at', 'desc')->get();
        $result['about'] = Sections::FindorFail(1);
        $result['facilities'] = Sections::FindorFail(2);
        $result['departments'] = Departments::where('status', 1)->get();
        $result['faqs'] = Faqs::where('status', 1)->get();
        // $result['about'] = Sections::FindorFail(1);
        // $result['about'] = Sections::FindorFail(1);
        $result['messages'] = Sections::where('section_key', 'messages')->get();
        $result['news'] = News::where('status', 1)->orderBy('published_at', 'desc')->take(10)->get();

        $result['albums'] = Albums::with('media')->orderBy('created_at', 'desc')->get();

        return view('education.home', $result);
        
    }

    // public function show(Request $request, $section_key)
    // {
    //     // Retrieve all rows with the given section_key
    //     $perPage = $request->input('perPage', 10);
    //     $result['news'] = News::paginate($perPage);
    //     // Pass the $sections variable to your view
    //     return view('education.' . $section_key, $result);
    // }

    public function sections(Request $request, $slug)
    {

        $result['sections'] = Sections::where('slug', $slug)->firstOrFail();
        // Pass the $sections variable to your view
        return view('education.sections', $result);
    }

    public function departments($slug)
    {
        $departmentsData = Departments::where('slug', $slug)->with(['departmentsImages', 'faculties'])->firstOrFail();
        return view('education.departments', compact('departmentsData'));
    }
    

    public function albums(Request $request)
    {

        $result['albums'] = Albums::with('media')->orderBy('created_at', 'desc')->get();
        // Pass the $sections variable to your view
        return view('education.albums', $result);
    }

    public function administrations(Request $request)
    {

        $result['administrations'] = Administrations::where('status', 1)->get();
        // Pass the $sections variable to your view
        return view('education.administrations', $result);
    }

    public function news(Request $request)
    {
        // Retrieve all rows with the given section_key
        $perPage = $request->input('perPage', 10);
        $result['news'] = News::orderBy('published_at', 'desc')->paginate($perPage);
        // Pass the $sections variable to your view
        return view('education.news', $result);
    }

    public function previewNews($slug)
    {
        // Retrieve the news item based on the provided slug
        $newsData = News::where('slug', $slug)->first();

        // Check if the news item exists
        if ($newsData) {
            return view('education.preview', compact('newsData'));
        } else {
            abort(404); // Show a 404 page if the news item with the given slug is not found
        }
    }
    public function entertainment()
    {
        return view('entertainment');
    }
}
