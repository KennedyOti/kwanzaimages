<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Booking; // Import the Booking model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all gallery images, services, and team members
        $images = Gallery::all();
        $services = Service::all();
        $teams = Team::all();

        // Pass the data to the home view
        return view('pages.home', compact('images', 'services', 'teams'));
    }

    /**
     * Handle booking form submission.
     */
    public function bookSession(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'full_names' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string|max:15',
            'service'   => 'required|string|max:50',
            'location'  => 'required|string|max:255',
            'date'      => 'required|date',
        ]);

        // Save the booking to the database
        Booking::create($validated);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your booking has been submitted successfully!');
    }
}
