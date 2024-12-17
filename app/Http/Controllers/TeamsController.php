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
            'image' => 'required|image|mimes:jpeg,png,webp,jpg|max:2048',
        ]);

        // Store the image in public/uploads/teams
        $imagePath = $request->file('image')->store('uploads/teams', 'public');

        // Save team member to database
        Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'image_path' => $imagePath,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Team member added successfully!');
    }

    public function update(Request $request, $id)
    {
        // Find the team member by ID
        $team = Team::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (file_exists(public_path('storage/' . $team->image_path))) {
                unlink(public_path('storage/' . $team->image_path));
            }

            // Store the new image
            $imagePath = $request->file('image')->store('uploads/teams', 'public');
            $team->image_path = $imagePath;
        }

        // Update team member details
        $team->update([
            'name' => $request->name,
            'role' => $request->role,
            'image_path' => $team->image_path, // Update only if image is provided
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Team member updated successfully!');
    }

    public function destroy($id)
    {
        // Find the team by ID
        $team = Team::findOrFail($id);

        // Delete the image file if it exists
        if (file_exists(public_path('storage/' . $team->image_path))) {
            unlink(public_path('storage/' . $team->image_path));
        }

        // Delete the team member from the database
        $team->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Team member removed successfully!');
    }
}
