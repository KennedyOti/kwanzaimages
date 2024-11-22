<?php

// app/Http/Controllers/ManageBlogController.php

// app/Http/Controllers/ManageBlogController.php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageBlogController extends Controller
{

    // Show the list of blogs
    public function index()
    {
        // Fetch all blogs from the database
        $blogs = Blog::all();
        return view('portal.manageblog.index', compact('blogs'));
    }

    // Show the form to create a new blog
    public function create()
    {
        return view('portal.manageblog.create');
    }

    // Store the newly created blog in the database
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'date_posted' => 'required|date',
        ]);

        // Handle file upload if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        // Create a new blog post
        Blog::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $imagePath,
            'author' => $request->author,
            'date_posted' => $request->date_posted,
            'likes' => 0, // Default likes count
        ]);

        // Redirect back to blog list with a success message
        return redirect()->route('manageblog.index')->with('success', 'Blog created successfully!');
    }

    // Show the form to edit an existing blog
    public function edit($id)
    {
        // Fetch the blog data to edit
        $blog = Blog::findOrFail($id);
        return view('portal.manageblog.edit', compact('blog'));
    }

    // Update the blog post in the database
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'date_posted' => 'required|date',
        ]);

        // Fetch the existing blog to update
        $blog = Blog::findOrFail($id);

        // Handle file upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $blog->image = $imagePath;
        }

        // Update the blog data
        $blog->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'author' => $request->author,
            'date_posted' => $request->date_posted,
        ]);

        // Redirect back to the blog list with a success message
        return redirect()->route('manageblog.index')->with('success', 'Blog updated successfully!');
    }

    // Delete the blog from the database
    public function destroy($id)
    {
        // Find the blog post to delete
        $blog = Blog::findOrFail($id);

        // Delete the associated image if it exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        // Delete the blog post from the database
        $blog->delete();

        // Redirect back to the blog list with a success message
        return redirect()->route('manageblog.index')->with('success', 'Blog deleted successfully!');
    }
}
