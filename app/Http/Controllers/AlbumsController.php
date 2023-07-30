<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albums;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Albums::where('status', 1)->get();
        return view('admin.albums', compact('albums'));
    }


    public function create(Request $request)
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

        return redirect()->route('albums.manage', $album->id)
            ->with('success', 'Album created successfully!');
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

    public function manage(Request $request, $id = '')
    {
        // if ($id > 0) {
        //     $arr  = Albums::where(['id' => $id])->get();
        //     $result['id']  = $arr[0]->id;
        //     $result['title']  = $arr[0]->title;
        //     $result['message']  = $arr[0]->message;
        // } else {
        //     $result['id']  = '';
        //     $result['title']  = '';
        //     $result['message']  = '';
        // }

        return view('admin.albums-manage');
    }

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
