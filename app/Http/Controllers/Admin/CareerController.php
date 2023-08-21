<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $result['career'] = Career::paginate($perPage);
        return view('admin.career', compact('result'), $result);
    }

    public function manage(Request $request, $id = '')
    {
        $careerData = new Career;

        if ($id > 0) {
            $careerData = Career::findOrFail($id);
        }

        return view('admin.career-manage', compact('careerData'));
    }



    public function process(Request $request, $id = null)
    {

        // Validation rules for the 'heading' and 'content' fields
        $validationRules = [
            'heading' => 'required',
            'content' => 'nullable',
            'attachment' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:1024', // 1MB (1024 KB) limit
            'published_at' => 'required',
            'deadline' => 'required',
        ];

        // Custom error messages for validation
        $customMessages = [
            'heading.required' => 'Please provide a heading.',
            'attachment.mimes' => 'Invalid file format. Only pdf, doc, docx, jpg, jpeg, png files are allowed.',
            'attachment.max' => 'The attachment must not be larger than 1MB.',
            'published_at.required' => 'Please select a date.',
            'deadline.required' => 'Please set a deadline.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {


            // Find the existing Career record
            $model = Career::findOrFail($id);

            // Check if the 'heading' and 'content' fields are being updated
            if ($request->filled('heading') || $request->filled('content')) {
                $model->heading = $request->input('heading');
                $model->content = $request->input('content');
                $model->published_at = $request->input('published_at');
                $model->deadline = $request->input('deadline');
                $message = 'Career updated successfully!';
            }
            $model->updated_by = $request->session()->get('ADMIN_ID');
        } else {
            // For insert operation, create a new Career model
            $model = new Career;
            $model->heading = $validatedData['heading'];
            $model->content = $validatedData['content'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $model->published_at = $validatedData['published_at'];
            $model->deadline = $validatedData['deadline'];
            $message = 'Career added successfully!';
        }


        // Convert the heading to a slug
        $model->slug = Str::slug($validatedData['heading']);

        // Check if the slug already exists in the database
        if ($id === null && Career::where('slug', $model->slug)->exists()) {
            // If the slug already exists for a different career item,
            // modify the slug to make it unique by appending a count
            $count = 1;
            $originalSlug = $model->slug;
            while (Career::where('slug', $model->slug)->exists()) {
                $model->slug = $originalSlug . '-' . $count;
                $count++;
            }
        }

        try {
            if ($request->hasFile('attachment')) {
                // Get the uploaded file from the request
                $attachment = $request->file('attachment');

                // Validate the file size and type
                if ($attachment->isValid()) {
                    // Generate a unique name for the file based on the slug and the file extension
                    $fileName = $model->slug . '.' . $attachment->getClientOriginalExtension();

                    // Store the file in the storage directory with the generated name
                    $attachmentPath = $attachment->storeAs('career-attachments', $fileName, 'public');

                    // Save the file path in the database
                    $model->attachment = $attachmentPath;
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to upload attachment.');
                }
            }

            // Save the model
            if ($model->save()) {
                return redirect('admin/career')->with('success', $message);
            } else {
                throw new \Exception('Failed to save career.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


    public function status(Request $request, $id)
    {
        $model = Career::findOrFail($id);

        $published = $request->has('status');

        if ($published) {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        $model->updated_by = $request->session()->get('ADMIN_ID');

        if ($published) {
            $message = 'Career published successfully!';
        } else {
            $message = 'Career is hidden now!';
        }

        if ($model->save()) {
            return redirect('admin/career')->with('success', $message);
        } else {
            return redirect('admin/career')->with('error', 'Failed to update!');
        }
    }

    public function delete($id)
    {
        $model = Career::find($id);

        if ($model) {
            // Delete the attached file if it exists
            if (!empty($model->attachment)) {
                $attachmentPath = 'public/' . $model->attachment;
                if (Storage::exists($attachmentPath)) {
                    Storage::delete($attachmentPath);
                }
            }

            $model->delete();
            return redirect('admin/career')->with('success', 'Career deleted successfully!');
        } else {
            return redirect('admin/career')->with('error', 'Failed to delete Career!');
        }
    }


    public function download($id)
    {
        // Find the career record by ID
        $model = Career::findOrFail($id);

        // Check if the attachment exists
        if ($model->attachment) {
            // Get the attachment path
            $attachmentPath = storage_path('app/public/' . $model->attachment);

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
