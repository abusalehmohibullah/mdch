<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\FacilitiesImages;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FacilitiesImagesController extends Controller
{
    public function index()
    {
        $facilitiesImages = FacilitiesImages::get();
        return view('admin.facilities-images', compact('facilitiesImages'));
    }

    public function manage(Request $request, $facilitiesImagesId = null)
    {

        $facilitiesImagesData = new FacilitiesImages;
        if ($facilitiesImagesId > 0) {
            $facilitiesImagesData = FacilitiesImages::findOrFail($facilitiesImagesId);
        }

        return view('admin.facilities-images-manage', compact('facilitiesImagesData'));
    }


    
    public function process(Request $request, $facilitiesImagesId = null)
    {
 
        // Validation rules for the 'media' field
        $validationRules = [
            'caption' => 'required',
            'facilitiesImages' => $facilitiesImagesId ? 'nullable|file|mimes:jpeg,png,gif,webp,svg|max:1024' : 'required|file|mimes:jpeg,png,gif,webp,svg|max:1024',
        ];

        // Custom error messages for validation
        $customMessages = [
            'caption.required' => 'Please enter a caption.',
            'facilitiesImages.required' => 'Please select a media file.',
            'facilitiesImages.file' => 'Please upload Image Only.',
            'facilitiesImages.max' => 'Image must be less than 1MB ',
            'facilitiesImages.mime' => 'Invalid file format. Only .jpeg, .png, .gif, .webp, .svg are allowed',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        
        // Check if $mediaId is provided, which indicates an update operation
        if ($facilitiesImagesId !== null) {

            // Find the existing media record
            $model = FacilitiesImages::findOrFail($facilitiesImagesId);
            if ($request->filled('caption')) {
                $model->caption = $request->input('caption');
                $model->updated_by = $request->session()->get('ADMIN_ID');
                $message = 'Media updated successfully!';
            }
        } else {

            $model = new FacilitiesImages;
            $model->caption = $validatedData['caption'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Media uploaded successfully!';
        }

        try {
            
            if ($request->hasFile('facilitiesImages')) {
                // Get the uploaded file from the request
                $attachment = $request->file('facilitiesImages');

                // Validate the file size and type
                if ($attachment->isValid()) {
                    // Handle creating a new departmentsImages item
                    $file = $request->file('facilitiesImages');
                
                    // Convert the caption to a slug
                    $slugifiedCaption = Str::slug($request->input('caption'));
                
                    // Add a timestamp to the file name
                    $timestamp = now()->format('YmdHis');
                    $fileName = $slugifiedCaption . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
                
                    $filePath = $file->storeAs('facilities/', $fileName, 'public');
                
                    // Save the file path in the database
                    $model->path = $filePath;
                }
                 else {
                    return redirect()->back()->withInput()->with('error', 'Failed to upload attachment.');
                }
            }

            // Save the model
            if ($model->save()) {
                return redirect()->route('facilitiesImages',  $facilitiesImagesId)->with('success', $message);
            } else {
                throw new \Exception('Failed to save news.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function delete($facilitiesImagesId)
    {
        $model = FacilitiesImages::find($facilitiesImagesId);

        if ($model) {
            if (!empty($model->path)) {
                $attachmentPath = 'public/' . $model->path;
                if (Storage::exists($attachmentPath)) {
                    Storage::delete($attachmentPath);
                }
            }

            $model->delete();
            return redirect()->route('facilitiesImages')->with('success', 'Image deleted successfully!');
        } else {
            return redirect()->route('facilitiesImages')->with('error', 'Failed to delete Image!');
        }
    }
}
