<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $result['faqs'] = Faqs::paginate($perPage);
        return view('admin.faqs', compact('result'), $result);
    }

    public function manage(Request $request, $id = '')
    {
        $faqsData = new Faqs;

        if ($id > 0) {
            $faqsData = Faqs::findOrFail($id);
        }

        return view('admin.faqs-manage', compact('faqsData'));
    }

    public function process(Request $request, $id = null)
    {

        // Validation rules for the 'question' and 'answer' fields
        $validationRules = [
            'question' => 'required',
            'answer' => 'required',
        ];

        // Custom error messages for validation
        $customMessages = [
            'question.required' => 'Please provide a question.',
            'answer.required' => 'Please provide an answer.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {

            
            // Find the existing FAQ record
            $model = Faqs::findOrFail($id);

            // Check if the 'question' and 'answer' fields are being updated
            if ($request->filled('question') && $request->filled('answer')) {
                $model->question = $request->input('question');
                $model->answer = $request->input('answer');
                $message = 'FAQ updated successfully!';

            } 
            $model->updated_by = $request->session()->get('ADMIN_ID');

        } else {
            // For insert operation, create a new FAQ model
            $model = new Faqs;
            $model->question = $validatedData['question'];
            $model->answer = $validatedData['answer'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'FAQ added successfully!';
        }

        // Save the model
        if ($model->save()) {
            return redirect('admin/faqs')->with('success', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add FAQ.');
        }
    }

    
    public function status(Request $request, $id)
    {
        $model = Faqs::findOrFail($id);
    
        $published = $request->has('status');
    
        if ($published) {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        $model->updated_by = $request->session()->get('ADMIN_ID');
        
        if ($published) {
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
