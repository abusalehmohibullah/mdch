<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Media;
use App\Models\Admin\Albums;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index($albumId)
    {
        $album = Albums::findOrFail($albumId);
        $mediaItems = $album->media;

        return view('admin.media', compact('album', 'mediaItems'));
    }

    public function manage(Request $request, $albumId, $mediaId = null)
    {
        $albumData = Albums::findOrFail($albumId);
        $mediaData = new Media;
        if ($mediaId > 0) {
            $mediaData = Media::findOrFail($mediaId);
        }

        return view('admin.media-manage', compact('mediaData', 'albumData'));
    }

    public function process(Request $request, $albumId, $mediaId = null)
    {
        // Validation rules for the 'media' field
        $validationRules = [
            'caption' => 'required',
            'media' => $mediaId ? 'nullable|file|mimes:jpeg,png,gif,webp,svg|max:1024' : 'required|file|mimes:jpeg,png,gif,webp,svg|max:1024',
        ];

        // Custom error messages for validation
        $customMessages = [
            'caption.required' => 'Please enter a caption.',
            'media.required' => 'Please select a media file.',
            'media.file' => 'Please upload Image Only.',
            'media.max' => 'Image must be less than 1MB ',
            'media.mime' => 'Invalid file format. Only .jpeg, .png, .gif, .webp, .svg are allowed',
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules, $customMessages);

        // Find the album for which we're adding/updating media
        $album = Albums::findOrFail($albumId);

        // Check if $mediaId is provided, which indicates an update operation
        if ($mediaId !== null) {
            // Find the existing media record
            $model = Media::findOrFail($mediaId);
            if ($request->filled('caption')) {
                $model->caption = $request->input('caption');
                $model->updated_by = $request->session()->get('ADMIN_ID');
                $message = 'Media updated successfully!';
            }
        } else {

            $model = new Media;
            $model->caption = $validatedData['caption'];
            $model->created_by = $request->session()->get('ADMIN_ID');
            $message = 'Media uploaded successfully!';
        }

        try {
            if ($request->hasFile('media')) {
                // Get the uploaded file from the request
                $attachment = $request->file('media');

                // Validate the file size and type
                if ($attachment->isValid()) {
                    // Handle creating a new media item
                    $file = $request->file('media');
                
                    // Convert the caption to a slug
                    $slugifiedCaption = Str::slug($request->input('caption'));
                
                    // Add a timestamp to the file name
                    $timestamp = now()->format('YmdHis');
                    $fileName = $slugifiedCaption . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
                
                    $folderPath = 'albums/' . $album->slug;
                    $filePath = $file->storeAs($folderPath, $fileName, 'public');
                
                    // Save the file path in the database
                    $model->path = $filePath;
                }
                 else {
                    return redirect()->back()->withInput()->with('error', 'Failed to upload attachment.');
                }
            }

            // Save the model
            if ($album->media()->save($model)) {
                return redirect('admin/albums/' . $albumId)->with('success', $message);
            } else {
                throw new \Exception('Failed to save news.');
            }
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function delete($albumId, $mediaId)
    {
        $model = Media::find($mediaId);

        if ($model) {
            if (!empty($model->path)) {
                $attachmentPath = 'public/' . $model->path;
                if (Storage::exists($attachmentPath)) {
                    Storage::delete($attachmentPath);
                }
            }

            $model->delete();
            return redirect()->route('admin.media',  $albumId)->with('success', 'Image deleted successfully!');
        } else {
            return redirect()->route('admin.media',  $albumId)->with('error', 'Failed to delete Image!');
        }
    }
}
