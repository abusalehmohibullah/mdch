<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Informations;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function index()
    {
        // Retrieve all rows with the given section_key
        $informations = Informations::get();

        // Pass the $sections variable to your view
        return view('admin.informations', compact('informations'));
    }

    public function manage(Request $request, $id = '')
    {
        $informationsData = new Informations;

        if ($id > 0) {
            $informationsData = Informations::findOrFail($id);
        }

        return view('admin.informations-manage', compact('informationsData'));
    }

    public function process(Request $request, $id = null)
    {

        // Validation rules for the 'title' and 'content' fields
        $validationRules = [
            'content' => 'required',
        ];

        // Custom error messages for validation
        $customMessages = [
            'content.required' => 'Please provide a content.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {
            $model = Informations::findOrFail($id);
            // Check if the 'title' and 'content' fields are being updated
            if ($request->filled('content')) {
  
                $model->content = $request->input('content');
                $message = 'Informations updated successfully!';
            }
            $model->updated_by = $request->session()->get('ADMIN_ID');
        } 

        try {
            // Save the model
            if ($model->save()) {
                return redirect('admin/settings/informations')->with('success', $message);

            } else {
                throw new \Exception('Failed to save information.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
