<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $userCount = User::count(); // Get the total number of users
        $bookingsCount = Booking::count(); // Get the total number of bookings
        $confirmed_bookingsCount = Booking::where('status', 'confirmed')->count(); // Get the total number of confirmed bookings
        $totalSales = Sale::sum('amount'); // Sum up the sales amounts from the Sale table
        $dailySales = Sale::whereDate('created_at', Carbon::today())->sum('amount'); // Sum up today's sales amounts
        $monthlySales = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('amount'); // Sum up the sales amounts for the current month

        $njoroSales = Sale::whereHas('branch', function ($query) {
            $query->where('name', 'kwanza njoro');
        })->sum('amount');

        $egertonSales = Sale::whereHas('branch', function ($query) {
            $query->where('name', 'kwanza egerton');
        })->sum('amount');




        return view('portal.dashboard', compact('userCount', 'totalSales', 'bookingsCount', 'confirmed_bookingsCount', 'dailySales', 'monthlySales', 'njoroSales', 'egertonSales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
