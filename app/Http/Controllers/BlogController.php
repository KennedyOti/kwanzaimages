<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('pages.blog.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $comments = $blog->comments;
        return view('pages.blog.show', compact('blog', 'comments'));
    }

    public function like($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->increment('likes');
        return redirect()->route('blogs.show', $blog->id);
    }

    public function storeComment(Request $request, $blogId)
    {
        // Validate the comment input
        $request->validate([
            'comment' => 'required|string|max:1000', // Ensure 'comment' is being validated
        ]);

        // Find the blog post
        $blog = Blog::findOrFail($blogId);

        // Create and store the comment
        $comment = new Comment();
        $comment->blog_id = $blog->id;
        $comment->name = $request->user()->name; // Assuming you're storing the user's name
        $comment->comment = $request->comment;  // Make sure 'comment' is being used here, not 'content'
        $comment->save();

        // Redirect back to the blog post with a success message
        return redirect()->route('blogs.show', $blogId)->with('success', 'Comment added successfully!');
    }
}
