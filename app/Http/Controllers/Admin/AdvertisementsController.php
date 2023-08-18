<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Advertisements;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdvertisementsController extends Controller
{
    public function index()
    {
        $advertisements = Advertisements::get();
        return view('admin.advertisements', compact('advertisements'));
    }

    public function manage(Request $request, $advertisementsId = null)
    {

        $advertisementsData = new Advertisements;
        if ($advertisementsId > 0) {
            $advertisementsData = Advertisements::findOrFail($advertisementsId);
        }

        return view('admin.advertisements-manage', compact('advertisementsData'));
    }


    
    public function process(Request $request, $advertisementsId = null)
    {
 
        // Validation rules for the 'media' field
        $validationRules = [
            'title' => 'required',
            'advertisements' => $advertisementsId ? 'nullable|file|mimes:jpeg,png,gif,webp,svg|max:1024' : 'required|file|mimes:jpeg,png,gif,webp,svg|max:1024',
        ];

        // Custom error messages for validation
        $customMessages = [
            'title.required' => 'Please enter a title.',
            'advertisements.required' => 'Please select a media file.',
            'advertisements.file' => 'Please upload Image Only.',
            'advertisements.max' => 'Image must be less than 1MB ',
            'advertisements.mime' => 'Invalid file format. Only .jpeg, .png, .gif, .webp, .svg are allowed',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        
        // Check if $mediaId is provided, which indicates an update operation
        if ($advertisementsId !== null) {

            // Find the existing media record
            $model = Advertisements::findOrFail($advertisementsId);
            if ($request->filled('title')) {
                $model->title = $request->input('title');
                $model->updated_by = $request->session()->get('ADMIN_ID');
                $message = 'Media updated successfully!';
            }
        } else {

            $model = new Advertisements;
            $model->title = $validatedData['title'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Media uploaded successfully!';
        }

        try {
            
            if ($request->hasFile('advertisements')) {
                // Get the uploaded file from the request
                $attachment = $request->file('advertisements');

                // Validate the file size and type
                if ($attachment->isValid()) {
                    // Handle creating a new departmentsImages item
                    $file = $request->file('advertisements');
                
                    // Convert the title to a slug
                    $slugifiedTitle = Str::slug($request->input('title'));
                
                    // Add a timestamp to the file name
                    $timestamp = now()->format('YmdHis');
                    $fileName = $slugifiedTitle . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
                
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
                return redirect()->route('admin.advertisements',  $advertisementsId)->with('success', $message);
            } else {
                throw new \Exception('Failed to save news.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function delete($advertisementsId)
    {
        $model = Advertisements::find($advertisementsId);

        if ($model) {
            if (!empty($model->path)) {
                $attachmentPath = 'public/' . $model->path;
                if (Storage::exists($attachmentPath)) {
                    Storage::delete($attachmentPath);
                }
            }

            $model->delete();
            return redirect()->route('admin.advertisements')->with('success', 'Image deleted successfully!');
        } else {
            return redirect()->route('admin.advertisements')->with('error', 'Failed to delete Image!');
        }
    }
}
