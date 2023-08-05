<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albums;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Albums::where('status', 1)->get();
        return view('admin.albums', compact('albums'));
    }

    public function manage(Request $request, $id = '')
    {
        $albumsData = new Albums;

        if ($id > 0) {
            $albumsData = Albums::findOrFail($id);
        }

        return view('admin.albums-manage', compact('albumsData'));
    }

    public function process(Request $request, $id = null)
    {
        // Validation rules for the 'title' and 'message' fields
        $validationRules = [
            'name' => 'required|max:255',
            'description' => 'required',
        ];

        // Custom error messages for validation
        $customMessages = [
            'name.required' => 'Please enter a name.',
            'name.max' => 'The name is too long.',
            'description.required' => 'Please describe the album.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Check if $id is provided, which indicates an update operation
        if ($id !== null) {


            // Find the existing albums record
            $model = Albums::findOrFail($id);


            if ($request->filled('name') && $request->filled('description')) {
                $model->name = $request->input('name');
                $model->description = $request->input('description');
                $message = 'Album updated successfully!';
            }
            $model->updated_by = $request->session()->get('ADMIN_ID');
        } else {
            // For insert operation, create a new albums model
            $model = new Albums;
            $model->name = $validatedData['name'];
            $model->description = $validatedData['description'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Album created successfully!';
        }


        // Convert the heading to a slug
        $model->slug = Str::slug($validatedData['name']);

        // Check if the slug already exists in the database
        if ($id === null && Albums::where('slug', $model->slug)->exists()) {
            // If the slug already exists for a different Albums item,
            // modify the slug to make it unique by appending a count
            $count = 1;
            $originalSlug = $model->slug;
            while (Albums::where('slug', $model->slug)->exists()) {
                $model->slug = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Save the model
        if ($model->save()) {
            return redirect('admin/albums')->with('success', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create album.');
        }
    }














    public function store(Request $request)
    {
        // Validation rules for the 'title' and 'message' fields
        $validationRules = [
            'name' => 'required|max:255',
        ];

        // Custom error messages for validation
        $customMessages = [
            'name.required' => 'Please enter a name.',
            'name.max' => 'The name is too long.',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);


        $album = Albums::create([
            'name' => $validatedData['name'],
            'created_by' => $request->session()->get('ADMIN_ID'),
        ]);

        return redirect()->route('albums', $album->id)
            ->with('success', 'Album created successfully!');
    }

    // public function manage(Request $request, $id = '')
    // {
    //     $albumsData = new Albums;

    //     if ($id > 0) {
    //         $albumsData = Albums::findOrFail($id);
    //     }

    //     return view('admin.albums-manage', compact('albumsData'));
    // }

    // public function show(Albums $album)
    // {
    //     return view('albums.show', compact('album'));
    // }

    public function destroy(Albums $album)
    {
        $album->delete();

        // Delete the folder and images associated with the album from storage
        Storage::deleteDirectory('public/albums/' . $album->id);

        return redirect()->route('albums.index')
            ->with('success', 'Album deleted successfully!');
    }
}
