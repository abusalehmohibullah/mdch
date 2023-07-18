<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        return view('admin.faqs');
    }

    public function faqs_manage()
    {
        return view('admin.faqs-manage');
    }

    public function faqs_process(Request $request)
    {

        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $model = new Faqs;
        $model->question = $validatedData['question'];
        $model->answer = $validatedData['answer'];
        $model->created_by = $request->session()->get('ADMIN_ID');
        $model->save();
        $request->session()->flash('success', 'FAQ added successfully!');
        return redirect('admin/faqs');
    }
}
