<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Administrations;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


class AdministrationsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $result['administrations'] = Administrations::paginate($perPage);
        return view('admin.administrations', compact('result'), $result);
    }

    public function manage(Request $request, $id = '')
    {
        $administrationsData = new Administrations;
    
        if ($id > 0) {
            $administrationsData = Administrations::findOrFail($id);
        }
    
        return view('admin.administrations-manage', compact('administrationsData'));
    }
    


    public function process(Request $request, $id = null)
    {
        // Validation rules for the 'administrations_name' and 'description' fields
        $validationRules = [
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => $id ? 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:1024' : 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:1024' // 1MB (1024 KB) limit
        ];

        // Custom error messages for validation
        $customMessages = [
            'name.required' => 'Please provide a name.',
            'designation.required' => 'Please provide a designation.',
            'description.required' => 'Please provide a description.',
            'image.mimes' => 'Invalid file format. Only pdf, doc, docx, jpg, jpeg, png files are allowed.',
            'image.max' => 'The image must not be larger than 1MB.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {


            // Find the existing Administrations record
            $model = Administrations::findOrFail($id);

            // Check if the 'administrations_name' and 'description' fields are being updated
            if ($request->filled('name') && $request->filled('designation') && $request->filled('description')) {
                $model->name = $request->input('name');
                $model->designation = $request->input('designation');
                $model->description = $request->input('description');
                $message = 'Administrations updated successfully!';
            }
            $model->updated_by = $request->session()->get('ADMIN_ID');
        } else {
            // For insert operation, create a new Administrations model
            $model = new Administrations;
            $model->slug = Str::slug($validatedData['designation']);
            $model->name = $validatedData['name'];
            $model->designation = $validatedData['designation'];
            $model->description = $validatedData['description'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Administrations added successfully!';
        }

        try {
            if ($request->hasFile('image')) {
                // Get the uploaded file from the request
                $image = $request->file('image');

                // Validate the file size and type
                if ($image->isValid()) {
                    // Generate a unique name for the file based on the administrations_name, date, and time
                    $fileName = Str::slug($validatedData['designation']) . '.' . $image->getClientOriginalExtension();

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
                return redirect('admin/administrations')->with('success', $message);
            } else {
                throw new \Exception('Failed to save administrations.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


    public function status(Request $request, $id)
    {
        $model = Administrations::findOrFail($id);

        $published = $request->has('status');

        if ($published) {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        $model->updated_by = $request->session()->get('ADMIN_ID');

        if ($published) {
            $message = 'Administrations published successfully!';
        } else {
            $message = 'Administrations is hidden now!';
        }

        if ($model->save()) {
            return redirect('admin/administrations')->with('success', $message);
        } else {
            return redirect('admin/administrations')->with('error', 'Failed to update!');
        }
    }

    public function delete($id)
    {
        $model = Administrations::find($id);

        if ($model) {
            $model->delete();
            return redirect('admin/administrations')->with('success', 'Administrations deleted successfully!');
        } else {
            return redirect('admin/administrations')->with('error', 'Failed to delete Administrations!');
        }
    }

}