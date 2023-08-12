<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $result['messages'] = Messages::paginate($perPage);
        return view('admin.messages', compact('result'), $result);
    }

    public function manage(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr  = Messages::where(['id' => $id])->get();
            $result['id']  = $arr[0]->id;
            $result['title']  = $arr[0]->title;
            $result['message']  = $arr[0]->message;
        } else {
            $result['id']  = '';
            $result['title']  = '';
            $result['message']  = '';
        }

        return view('admin.messages-manage', $result);
    }


    public function process(Request $request, $id = null)
    {

        // Validation rules for the 'title' and 'message' fields
        $validationRules = [
            'title' => 'required',
            'message' => 'required',
        ];

        // Custom error messages for validation
        $customMessages = [
            'title.required' => 'Please provide a title.',
            'message.required' => 'Please provide an message.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {

            
            // Find the existing FAQ record
            $model = Messages::findOrFail($id);

            // Check if the 'title' and 'message' fields are being updated
            if ($request->filled('title') && $request->filled('message')) {
                $model->title = $request->input('title');
                $model->message = $request->input('message');
                $message = 'FAQ updated successfully!';

            } 
            $model->updated_by = $request->session()->get('ADMIN_ID');

        } else {
            // For insert operation, create a new FAQ model
            $model = new Messages;
            $model->title = $validatedData['title'];
            $model->message = $validatedData['message'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'FAQ added successfully!';
        }

        // Save the model
        if ($model->save()) {
            return redirect('admin/messages')->with('success', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add FAQ.');
        }
    }

    
    public function status(Request $request, $id)
    {
        $model = Messages::findOrFail($id);
    
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
            return redirect('admin/messages')->with('success', $message);
        } else {
            return redirect('admin/messages')->with('error', 'Failed to update!');
        }
       
    }

    public function delete($id)
    {
        $model = Messages::find($id);

        if ($model) {
            $model->delete();
            return redirect('admin/messages')->with('success', 'FAQ deleted successfully!');
        } else {
            return redirect('admin/messages')->with('error', 'Failed to delete FAQ!');
        }
    }
}
