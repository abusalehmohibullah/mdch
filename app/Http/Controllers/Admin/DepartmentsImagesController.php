<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\DepartmentsImages;
use App\Models\Admin\Departments;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DepartmentsImagesController extends Controller
{
    public function index($departmentsId)
    {
        $departments = Departments::findOrFail($departmentsId);
        $departmentsImagesItems = $departments->departmentsImages;

        return view('admin.departments-images', compact('departments', 'departmentsImagesItems'));
    }

    public function manage(Request $request, $departmentsId, $departmentsImagesId = null)
    {
        $departmentsData = Departments::findOrFail($departmentsId);
        $departmentsImagesData = new DepartmentsImages;
        if ($departmentsImagesId > 0) {
            $departmentsImagesData = DepartmentsImages::findOrFail($departmentsImagesId);
        }

        return view('admin.departments-images-manage', compact('departmentsImagesData', 'departmentsData'));
    }


    
    public function process(Request $request, $departmentsId, $departmentsImagesId = null)
    {
 
        // Validation rules for the 'media' field
        $validationRules = [
            'caption' => 'required',
            'departmentsImages' => $departmentsImagesId ? 'nullable|file|mimes:jpeg,png,gif,webp,svg|max:1024' : 'required|file|mimes:jpeg,png,gif,webp,svg|max:1024',
        ];

        // Custom error messages for validation
        $customMessages = [
            'caption.required' => 'Please enter a caption.',
            'departmentsImages.required' => 'Please select a media file.',
            'departmentsImages.file' => 'Please upload Image Only.',
            'departmentsImages.max' => 'Image must be less than 1MB ',
            'departmentsImages.mime' => 'Invalid file format. Only .jpeg, .png, .gif, .webp, .svg are allowed',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Find the album for which we're adding/updating media
        $departments = Departments::findOrFail($departmentsId);

        // Check if $mediaId is provided, which indicates an update operation
        if ($departmentsImagesId !== null) {

            // Find the existing media record
            $model = DepartmentsImages::findOrFail($departmentsImagesId);
            if ($request->filled('caption')) {
                $model->caption = $request->input('caption');
                $model->updated_by = $request->session()->get('ADMIN_ID');
                $message = 'Media updated successfully!';
            }
        } else {

            $model = new DepartmentsImages;
            $model->caption = $validatedData['caption'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Media uploaded successfully!';
        }

        try {
            
            if ($request->hasFile('departmentsImages')) {
                // Get the uploaded file from the request
                $attachment = $request->file('departmentsImages');

                // Validate the file size and type
                if ($attachment->isValid()) {
                    // Handle creating a new departmentsImages item
                    $file = $request->file('departmentsImages');
                
                    // Convert the caption to a slug
                    $slugifiedCaption = Str::slug($request->input('caption'));
                
                    // Add a timestamp to the file name
                    $timestamp = now()->format('YmdHis');
                    $fileName = $slugifiedCaption . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
                
                    $filePath = $file->storeAs('departments/', $fileName, 'public');
                
                    // Save the file path in the database
                    $model->path = $filePath;
                }
                 else {
                    return redirect()->back()->withInput()->with('error', 'Failed to upload attachment.');
                }
            }

            // Save the model
            if ($departments->departmentsImages()->save($model)) {
                return redirect()->route('admin.departmentsImages',  $departmentsId)->with('success', $message);
            } else {
                throw new \Exception('Failed to save news.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function delete($departmentsId, $departmentsImagesId)
    {
        $model = DepartmentsImages::find($departmentsImagesId);

        if ($model) {
            if (!empty($model->path)) {
                $attachmentPath = 'public/' . $model->path;
                if (Storage::exists($attachmentPath)) {
                    Storage::delete($attachmentPath);
                }
            }

            $model->delete();
            return redirect()->route('admin.departmentsImages',  $departmentsId)->with('success', 'Image deleted successfully!');
        } else {
            return redirect()->route('admin.departmentsImages',  $departmentsId)->with('error', 'Failed to delete Image!');
        }
    }
}
