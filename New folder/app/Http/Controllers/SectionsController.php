<?php


namespace App\Http\Controllers;

use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SectionsController extends Controller
{
    public function index($section_key)
    {
        // Retrieve all rows with the given section_key
        $sections = Sections::where('section_key', $section_key)->get();

        // Pass the $sections variable to your view
        return view('admin.' . $section_key, compact('sections'));
    }

    public function manage(Request $request, $section_key, $id = '')
    {
        $sectionsData = new Sections;

        if ($id > 0) {
            $sectionsData = Sections::findOrFail($id);
        }

        return view('admin.' . $section_key . '-manage', compact('sectionsData'));
    }



    public function process(Request $request, $section_key, $id = null)
    {

        // Validation rules for the 'title' and 'content' fields
        $validationRules = [
            'title' => 'required',
            'content' => 'required',
            'attachment' => 'nullable|mimes:jpg,jpeg,png|max:1024', // 1MB (1024 KB) limit
        ];

        // Custom error messages for validation
        $customMessages = [
            'title.required' => 'Please provide a title.',
            'content.required' => 'Please provide a content.',
            'attachment.mimes' => 'Invalid file format. Only jpg, jpeg, png files are allowed.',
            'attachment.max' => 'The attachment must not be larger than 1MB.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {


            $model = Sections::findOrFail($id);
            // Check if the 'title' and 'content' fields are being updated
            if ($request->filled('title') || $request->filled('content')) {
  
                $model->title = $request->input('title');
                $model->content = $request->input('content');
                $message = 'Sections updated successfully!';
            }
            $model->updated_by = $request->session()->get('ADMIN_ID');
        }

        try {

            if ($request->hasFile('attachment')) {
                // Get the uploaded file from the request
                $attachment = $request->file('attachment');
        
                // Validate the file size and type
                if ($attachment->isValid()) {
                    // Generate a unique name for the file based on the slug and the file extension
                    $fileName = $model->slug . '.jpg';
        
                    // Store the file in the storage directory with the generated name
                    $attachment->storeAs('default', $fileName, 'public');
        
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to upload attachment.');
                }
            }

            // Save the model
            if ($model->save()) {
                return redirect('admin/' . $section_key)->with('success', $message);

            } else {
                throw new \Exception('Failed to save news.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


    public function status(Request $request, $id)
    {
        $model = Sections::findOrFail($id);

        $published = $request->has('status');

        if ($published) {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        $model->updated_by = $request->session()->get('ADMIN_ID');

        if ($published) {
            $message = 'Sections published successfully!';
        } else {
            $message = 'Sections is hidden now!';
        }

        if ($model->save()) {
            return redirect('admin/news')->with('success', $message);
        } else {
            return redirect('admin/news')->with('error', 'Failed to update!');
        }
    }

    public function delete($id)
    {
        $model = Sections::find($id);

        if ($model) {
            $model->delete();
            return redirect('admin/news')->with('success', 'Sections deleted successfully!');
        } else {
            return redirect('admin/news')->with('error', 'Failed to delete Sections!');
        }
    }

    public function download($id)
    {
        // Find the news record by ID
        $newsData = Sections::findOrFail($id);

        // Check if the attachment exists
        if ($newsData->attachment) {
            // Get the attachment path
            $attachmentPath = storage_path('app/public/' . $newsData->attachment);

            // Check if the file exists
            if (file_exists($attachmentPath)) {
                // Extract the filename from the path
                $filename = pathinfo($attachmentPath, PATHINFO_BASENAME);

                // Return the file for download
                return response()->download($attachmentPath, $filename);
            } else {
                // File not found, redirect back with an error message
                return redirect()->back()->with('error', 'Attachment not found.');
            }
        } else {
            // No attachment, redirect back with an error message
            return redirect()->back()->with('error', 'No attachment available.');
        }
    }
}
