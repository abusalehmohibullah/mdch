<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $result['data'] = Faqs::all();
        return view('admin.faqs', $result);
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
        ], [
            'question.required' => 'Please provide a question.',
            'answer.required' => 'Please provide an answer.',
        ]);
        

        $model = new Faqs;
        $model->question = $validatedData['question'];
        $model->answer = $validatedData['answer'];
        $model->created_by = $request->session()->get('ADMIN_ID');

        if ($model->save()) {
            $request->session()->flash('success', 'FAQ added successfully!');
            return redirect('admin/faqs');
        } else {
            $request->session()->flash('error', 'Failed to add FAQ.');
            return redirect()->back()->withInput();
        }
    }
}
