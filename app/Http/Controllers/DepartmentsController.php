<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $result['departments'] = Departments::paginate($perPage);
        return view('admin.departments', compact('result'), $result);
    }

    public function manage(Request $request, $id = '')
    {
        $departmentsData = new Departments;
    
        if ($id > 0) {
            $departmentsData = Departments::findOrFail($id);
        }
    
        return view('admin.departments-manage', compact('departmentsData'));
    }
    


    public function process(Request $request, $id = null)
    {

        // Validation rules for the 'department_name' and 'description' fields
        $validationRules = [
            'department_name' => 'required',
            'department_head' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:1024', // 1MB (1024 KB) limit
        ];

        // Custom error messages for validation
        $customMessages = [
            'department_name.required' => 'Please provide a department_name.',
            'department_head.required' => 'Please provide a department_head.',
            'description.required' => 'Please provide a description.',
            'image.required' => 'Please select an image.',
            'image.mimes' => 'Invalid file format. Only pdf, doc, docx, jpg, jpeg, png files are allowed.',
            'image.max' => 'The image must not be larger than 1MB.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {


            // Find the existing Departments record
            $model = Departments::findOrFail($id);

            // Check if the 'department_name' and 'description' fields are being updated
            if ($request->filled('department_name') && $request->filled('department_head') && $request->filled('description')) {
                $model->department_name = $request->input('department_name');
                $model->department_name = $request->input('department_head');
                $model->description = $request->input('description');
                $message = 'Department updated successfully!';
            }
            $model->updated_by = $request->session()->get('ADMIN_ID');
        } else {
            // For insert operation, create a new Departments model
            $model = new Departments;
            $model->department_name = $validatedData['department_name'];
            $model->department_head = $validatedData['department_head'];
            $model->description = $validatedData['description'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Department added successfully!';
        }

        try {
            if ($request->hasFile('image')) {
                // Get the uploaded file from the request
                $image = $request->file('image');

                // Validate the file size and type
                if ($image->isValid()) {
                    // Generate a unique name for the file based on the department_name, date, and time
                    $fileName = Str::slug($validatedData['department_name']) . '-' . Carbon::now()->format('Ymd-His') . '.' . $image->getClientOriginalExtension();

                    // Store the file in the storage directory with the generated name
                    $imagePath = $image->storeAs('images', $fileName, 'public');


                    // Save the file path in the database
                    $model->image = $imagePath;
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to upload image.');
                }
            }

            // Save the model
            if ($model->save()) {
                return redirect('admin/departments')->with('success', $message);
            } else {
                throw new \Exception('Failed to save department.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


    public function status(Request $request, $id)
    {
        $model = Departments::findOrFail($id);

        $published = $request->has('status');

        if ($published) {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        $model->updated_by = $request->session()->get('ADMIN_ID');

        if ($published) {
            $message = 'Department published successfully!';
        } else {
            $message = 'Department is hidden now!';
        }

        if ($model->save()) {
            return redirect('admin/departments')->with('success', $message);
        } else {
            return redirect('admin/departments')->with('error', 'Failed to update!');
        }
    }

    public function delete($id)
    {
        $model = Departments::find($id);

        if ($model) {
            $model->delete();
            return redirect('admin/departments')->with('success', 'Departments deleted successfully!');
        } else {
            return redirect('admin/departments')->with('error', 'Failed to delete Departments!');
        }
    }

    public function download($id)
    {
        // Find the departments record by ID
        $departmentsData = Departments::findOrFail($id);
    
        // Check if the image exists
        if ($departmentsData->image) {
            // Get the image path
            $imagePath = storage_path('app/public/' . $departmentsData->image);
    
            // Check if the file exists
            if (file_exists($imagePath)) {
                // Extract the filename from the path
                $filename = pathinfo($imagePath, PATHINFO_BASENAME);
    
                // Return the file for download
                return response()->download($imagePath, $filename);
            } else {
                // File not found, redirect back with an error message
                return redirect()->back()->with('error', 'Image not found.');
            }
        } else {
            // No image, redirect back with an error message
            return redirect()->back()->with('error', 'No image available.');
        }
    }
}