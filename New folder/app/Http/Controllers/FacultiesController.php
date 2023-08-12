<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Faculties;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Database\QueryException;

class FacultiesController extends Controller
{
    public function index($departmentsId)
    {
        $perPage = 10; // Number of faculties per page
    
        $departments = Departments::findOrFail($departmentsId);
        $facultiesItem = $departments->faculties()->paginate($perPage);
    
        return view('admin.faculties', compact('departments', 'facultiesItem'));
    }
    


    public function manage(Request $request, $departmentsId, $facultiesId = null)
    {
        $facultiesData = new Faculties;

        if ($facultiesId > 0) {
            $facultiesData = Faculties::findOrFail($facultiesId);
        }

        return view('admin.faculties-manage', compact('facultiesData','departmentsId'));
    }



    public function process(Request $request, $departmentsId, $facultiesId = null)
    {

        // Validation rules for the 'name' and 'description' fields
        $validationRules = [
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => $facultiesId ? 'nullable|file|mimes:jpeg,png,gif,webp,svg|max:1024' : 'required|file|mimes:jpeg,png,gif,webp,svg|max:1024',
        ];

        // Custom error messages for validation
        $customMessages = [
            'name.required' => 'Please provide a name pf the department.',
            'designation.required' => 'Please select a designation.',
            'description.required' => 'Please provide a description.',
            'image.required' => 'Please select a media file.',
            'image.file' => 'Please upload Image Only.',
            'image.max' => 'Image must be less than 1MB ',
            'image.mime' => 'Invalid file format. Only .jpeg, .png, .gif, .webp, .svg are allowed',

        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        $departments = Departments::findOrFail($departmentsId);

        // Check if $mediaId is provided, which indicates an update operation
        if ($facultiesId !== null) {
            // Find the existing media record
            $model = Faculties::findOrFail($facultiesId);
            if ($request->filled('name') && $request->filled('designation') && $request->filled('description')) {
                $model->name = $request->input('name');
                $model->designation = $request->input('designation');
                $model->description = $request->input('description');
                $model->updated_by = $request->session()->get('ADMIN_ID');
                $message = 'Faculty updated successfully!';
            }
        } else {
            $model = new Faculties;
            $model->name = $validatedData['name'];
            $model->designation = $validatedData['designation'];
            $model->description = $validatedData['description'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Faculty added successfully!';
        }

        try {

            if ($request->hasFile('image')) {
                // Get the uploaded file from the request
                $attachment = $request->file('image');

                // Validate the file size and type
                if ($attachment->isValid()) {
                    // Handle creating a new image item
                    $file = $request->file('image');
                
                    // Convert the caption to a slug
                    $slugifiedCaption = Str::slug($request->input('caption'));
                
                    // Add a timestamp to the file name
                    $timestamp = now()->format('YmdHis');
                    $fileName = $slugifiedCaption . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
                
                    $filePath = $file->storeAs('departments/faculties/', $fileName, 'public');
                
                    // Save the file path in the database
                    $model->image_path = $filePath;
                }
                 else {
                    return redirect()->back()->withInput()->with('error', 'Failed to upload attachment.');
                }
            }

            // Save the model
            if ($departments->faculties()->save($model)) {
                return redirect()->route('faculties',  $departmentsId)->with('success', $message);
            } else {
                throw new \Exception('Failed to save Faculty.');
            }
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
        
    }


    public function status(Request $request, $departmentsId, $facultiesId)
    {
        $model = Faculties::findOrFail($facultiesId);

        $published = $request->has('status');

        if ($published) {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        $model->updated_by = $request->session()->get('ADMIN_ID');

        if ($published) {
            $message = 'Faculty published successfully!';
        } else {
            $message = 'Faculty is hidden now!';
        }

        if ($model->save()) {
            return redirect()->route('faculties',  $departmentsId)->with('success', $message);
        } else {
            return redirect('admin/faculties')->with('error', 'Failed to update!');
        }
    }

    public function delete($departmentsId, $facultiesId)
    {
        $model = Faculties::find($facultiesId);

        if ($model) {

            if (!empty($model->image_path)) {
                $attachmentPath = 'public/' . $model->image_path;
                if (Storage::exists($attachmentPath)) {
                    Storage::delete($attachmentPath);
                }
            }

            $model->delete();
            return redirect()->route('faculties',  $departmentsId)->with('success', 'Faculty deleted successfully!');
        } else {
            return redirect()->route('faculties',  $departmentsId)->with('error', 'Failed to delete Faculty!');
        }
    }
}
