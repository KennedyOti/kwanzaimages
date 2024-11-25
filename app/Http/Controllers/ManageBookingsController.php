<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ManageBookingsController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('portal.booking.index', compact('bookings'));
    }

    /**
     * Show the form for editing a booking.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('managebookings.edit', compact('booking'));
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'full_names' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'service' => 'required|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $booking->update($validated);

        return redirect()->route('managebookings.index')->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('managebookings.index')->with('success', 'Booking deleted successfully!');
    }

    /**
     * Confirm the specified booking.
     */
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'confirmed']);

        return redirect()->route('managebookings.index')->with('success', 'Booking confirmed successfully!');
    }
}
