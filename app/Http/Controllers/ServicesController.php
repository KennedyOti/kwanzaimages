<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Display the services page with all services.
     */
    public function index()
    {
        $services = Service::all(); // Fetch all services
        return view('portal.services', compact('services')); // Pass services to the view
    }

    /**
     * Store a new service.
     */
    public function store(Request $request)
    {
        // Validate the request input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        // Handle the image upload
        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/services'), $fileName);

        // Save the service in the database
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => 'uploads/services/' . $fileName,
        ]);

        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }

    /**
     * Show the form for editing a specific service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('portal.edit-service', compact('service'));
    }

    /**
     * Update a service.
     */
    public function update(Request $request, $id)
    {
        // Validate the request input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $service = Service::findOrFail($id);

        // Handle the image upload if a new one is provided
        if ($request->hasFile('image')) {
            // Delete the old image
            if (file_exists(public_path($service->image_path))) {
                unlink(public_path($service->image_path));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/services'), $fileName);
            $service->image_path = 'uploads/services/' . $fileName;
        }

        // Update the service details
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $service->image_path,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Delete a service.
     */
    public function destroy($id)
    {
        // Find the service record
        $service = Service::findOrFail($id);

        // Delete the file from the server
        if (file_exists(public_path($service->image_path))) {
            unlink(public_path($service->image_path));
        }

        // Delete the record from the database
        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }
}
