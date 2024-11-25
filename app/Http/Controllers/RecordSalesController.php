<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class RecordSalesController extends Controller
{
    /**
     * Show the form for creating a new sale.
     */
    public function create()
    {
        $services = Service::all();
        $branches = Branch::all();

        return view('portal.sales.createsale', compact('services', 'branches'));
    }

    /**
     * Store a newly created sale in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            // Create the sale record
            Sale::create([
                'service_id' => $request->service_id,
                'branch_id' => $request->branch_id,
                'quantity' => $request->quantity,
                'amount' => $request->amount,
                'user_id' => Auth::id(), // Assign the current authenticated user
            ]);

            // Success message
            return redirect()->route('sales.create')->with('success', 'Sale recorded successfully!');
        } catch (\Exception $e) {
            // Error message
            return redirect()->route('sales.create')->with('error', 'There was an error recording the sale. Please try again.');
        }
    }
}
