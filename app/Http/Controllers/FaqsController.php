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

    public function manage(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr  = Faqs::where(['id' => $id])->get();
            $result['id']  = $arr[0]->id;
            $result['question']  = $arr[0]->question;
            $result['answer']  = $arr[0]->answer;
        } else {
            $result['id']  = '';
            $result['question']  = '';
            $result['answer']  = '';
        }

        return view('admin.faqs-manage', $result);
    }


    public function process(Request $request, $id = null)
    {

    // Use dd() to print the form values
    dd($request->all());
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

            } else if ($request->filled('status')) {

                // Update the 'status' field if the 'status' checkbox is checked
                if ($request->has('status')) {
                    $model->status = 1;
                    $message = 'FAQ published successfully!';
                } else {
                    $model->status = 0;
                    $message = 'FAQ is hidden!';
                }
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
