<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Database\QueryException;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        $phaseNames = [
            1 => '1st Phase',
            2 => '2nd Phase',
            3 => '3rd Phase',
            4 => '4th Phase',
        ];
    
        $perPage = $request->input('perPage', 10);
        $result['departments'] = Departments::orderBy('phase', 'asc')->paginate($perPage);
        return view('admin.departments', compact('result', 'phaseNames'), $result);
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

        // Validation rules for the 'name' and 'description' fields
        $validationRules = [
            'name' => 'required',
            'phase' => 'required',
            'description' => 'required',
        ];

        // Custom error messages for validation
        $customMessages = [
            'name.required' => 'Please provide a name pf the department.',
            'phase.required' => 'Please select a phase.',
            'description.required' => 'Please provide a description.',

        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Initialize the $message variable
        $message = '';
        $route = '';

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {


            // Find the existing Departments record
            $model = Departments::findOrFail($id);

            // Check if the 'name' and 'description' fields are being updated
            if ($request->filled('name') && $request->filled('phase') && $request->filled('description')) {
                $model->name = $request->input('name');
                $model->phase = $request->input('phase');
                $model->slug = Str::slug($request->input('name'));
                $model->description = $request->input('description');
                $message = 'Department updated successfully!';
                $route = 'departments';
            }
            $model->updated_by = $request->session()->get('ADMIN_ID');
        } else {
            // For insert operation, create a new Departments model
            $model = new Departments;
            $model->name = $validatedData['name'];
            $model->phase = $validatedData['phase'];
            $model->slug = Str::slug($validatedData['name']);
            $model->description = $validatedData['description'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Department added successfully!';
            $route = 'departments.manage';
        }

        try {
            // Save the model
            if ($model->save()) {
                $newDepartmentId = $model->id; // Get the ID of the newly created department
                return redirect()->route($route,  $newDepartmentId)->with('success', $message);
            } else {
                throw new \Exception('Failed to save department.');
            }
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // Check for integrity constraint violation
                return redirect()->back()->withInput()->with('error', 'This department already exists. Please enter another one.');
            } else {
                // Handle other exceptions if needed
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        } catch (\Exception $e) {
            // Handle other exceptions
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
            return redirect('admin/departments')->with('success', 'Department deleted successfully!');
        } else {
            return redirect('admin/departments')->with('error', 'Failed to delete Department!');
        }
    }
}
