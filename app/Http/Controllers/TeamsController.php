<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index()
    {
        // Get all teams to display in the view
        $teams = Team::all();
        return view('portal.teams', compact('teams'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Store the image in public/uploads/teams
        $imagePath = $request->file('image')->store('uploads/teams', 'public');

        // Save team member to database
        Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'image_path' => $imagePath, // Correct the field name to image_path
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Team member added successfully!');
    }

    public function destroy($id)
    {
        // Find the team by ID
        $team = Team::findOrFail($id);

        // Delete the image file if it exists
        if (file_exists(public_path('storage/' . $team->image_path))) {
            unlink(public_path('storage/' . $team->image_path)); // Correct path for file deletion
        }

        // Delete the team member from the database
        $team->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Team member removed successfully!');
    }
}
