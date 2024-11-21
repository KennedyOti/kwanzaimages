<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display the gallery page with all images.
     */
    public function index()
    {
        $images = Gallery::all(); // Fetch all images
        return view('portal.gallery', compact('images')); // Pass images to the view
    }

    /**
     * Store a new image in the gallery.
     */
    public function store(Request $request)
    {
        // Validate the request input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/gallery'), $fileName);

        // Save the image path in the database
        Gallery::create(['image_path' => 'uploads/gallery/' . $fileName]);

        return redirect()->route('gallery.index')->with('success', 'Image added successfully.');
    }

    /**
     * Delete an image from the gallery.
     */
    public function destroy($id)
    {
        // Find the image record
        $image = Gallery::findOrFail($id);

        // Delete the file from the server
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        // Delete the record from the database
        $image->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully.',
        ]);
    }
}
