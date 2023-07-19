<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $result['faqs'] = Faqs::paginate($perPage);
        return view('admin.faqs', compact('result'), $result);
    }

    public function manage(Request $id)
    {
        return view('admin.faqs-manage', $id);
    }

    public function process(Request $request)
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
            return redirect('admin/faqs')->with('success', 'FAQ added successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add FAQ.');
        }
    }

    public function update(Request $request, $id)
    {
        $model = Faqs::findOrFail($id);
    
        $published = $request->has('status');
        $updateQuestionAnswer = $request->filled('question') || $request->filled('answer');
    
        if ($updateQuestionAnswer) {
            if ($request->filled('question')) {
                $model->question = $request->input('question');
            }
    
            if ($request->filled('answer')) {
                $model->answer = $request->input('answer');
            }
        }
    
        if ($published) {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        
        if ($updateQuestionAnswer) {
            $message = 'FAQ updated successfully!';
        } elseif ($published) {
            $message = 'FAQ published successfully!';
        } else {
            $message = 'FAQ is hidden now!';
        }

        if ($model->save()) {
            return redirect('admin/faqs')->with('success', $message);
        } else {
            return redirect('admin/faqs')->with('error', 'Failed to update!');
        }
       
    }

    public function delete($id)
    {
        $model = Faqs::find($id);

        if ($model) {
            $model->delete();
            return redirect('admin/faqs')->with('success', 'FAQ deleted successfully!');
        } else {
            return redirect('admin/faqs')->with('error', 'Failed to delete FAQ!');
        }
    }
    
}
