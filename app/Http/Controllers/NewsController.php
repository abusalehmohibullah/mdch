<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $result['news'] = News::paginate($perPage);
        return view('admin.news', compact('result'), $result);
    }

    public function manage(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr  = News::where(['id' => $id])->get();
            $result['id']  = $arr[0]->id;
            $result['heading']  = $arr[0]->heading;
            $result['content']  = $arr[0]->content;
        } else {
            $result['id']  = '';
            $result['heading']  = '';
            $result['content']  = '';
        }

        return view('admin.news-manage', $result);
    }


    public function process(Request $request, $id = null)
    {

        // Validation rules for the 'heading' and 'content' fields
        $validationRules = [
            'heading' => 'required',
            'content' => 'required',
        ];

        // Custom error messages for validation
        $customMessages = [
            'heading.required' => 'Please provide a heading.',
            'content.required' => 'Please provide an content.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {

            
            // Find the existing FAQ record
            $model = News::findOrFail($id);

            // Check if the 'heading' and 'content' fields are being updated
            if ($request->filled('heading') && $request->filled('content')) {
                $model->heading = $request->input('heading');
                $model->content = $request->input('content');
                $message = 'FAQ updated successfully!';

            } 
            $model->updated_by = $request->session()->get('ADMIN_ID');

        } else {
            // For insert operation, create a new FAQ model
            $model = new News;
            $model->heading = $validatedData['heading'];
            $model->content = $validatedData['content'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'FAQ added successfully!';
        }

        // Save the model
        if ($model->save()) {
            return redirect('admin/news')->with('success', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add FAQ.');
        }
    }

    
    public function status(Request $request, $id)
    {
        $model = News::findOrFail($id);
    
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
            return redirect('admin/news')->with('success', $message);
        } else {
            return redirect('admin/news')->with('error', 'Failed to update!');
        }
       
    }

    public function delete($id)
    {
        $model = News::find($id);

        if ($model) {
            $model->delete();
            return redirect('admin/news')->with('success', 'FAQ deleted successfully!');
        } else {
            return redirect('admin/news')->with('error', 'Failed to delete FAQ!');
        }
    }
}
