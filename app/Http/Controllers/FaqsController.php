<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index() {
        return view('admin.faqs');
    }

    public function manage_faqs() {
        return view('admin.manage-faqs');
    }
}
