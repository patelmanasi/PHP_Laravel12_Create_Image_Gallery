<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display all images (INDEX)
     */
    public function index()
    {
        // Soft deleted images are automatically excluded
        $images = Image::latest()->get();

        return view('gallery.index', compact('images'));
    }

    /**
     * Show create image form
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store uploaded image
     */
    public function store(Request $request)
    {
        // Step 1: Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // Step 2: Get uploaded file
        $file = $request->file('image');

        // Step 3: Create unique image name
        $filename = time() . '_' . $file->getClientOriginalName();

        // Step 4: Move image to public/images
        $file->move(public_path('images'), $filename);

        // Step 5: Save image info to database
        Image::create([
            'title'    => $request->title,
            'filename' => $filename,
        ]);

        // Step 6: Redirect back with success message
        return redirect()->route('gallery.index')
            ->with('success', 'Image uploaded successfully');
    }

    /**
     * Soft delete image
     */
    public function destroy($id)
    {
        // Step 1: Find image
        $image = Image::findOrFail($id);

        // Step 2: Delete image file from folder
        $imagePath = public_path('images/' . $image->filename);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Step 3: Soft delete database record
        $image->delete();

        // Step 4: Redirect back with success message
        return back()->with('success', 'Image deleted successfully');
    }
}
