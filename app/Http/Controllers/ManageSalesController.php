<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ManageSalesController extends Controller
{
    /**
     * Display a listing of the sales with pagination and filter search.
     */
    public function index(Request $request)
    {
        $query = Sale::with('service', 'branch', 'user');

        // Apply filters based on request input
        // Apply filters based on request input
        // Apply filters based on request input
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $specificDate = $request->date ?? null;

            $query->where(function ($q) use ($searchTerm, $specificDate) {
                $q->where('client_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('client_contact', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('service', function ($q) use ($searchTerm) {
                        $q->where('title', 'LIKE', '%' . $searchTerm . '%');
                    })
                    ->orWhereHas('branch', function ($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                    })
                    ->orWhere('quantity', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('status', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function ($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                    });

                // Add specific date filter
                if ($specificDate) {
                    $q->whereDate('created_at', $specificDate);
                }
            });
        }

        $sales = $query->paginate(9);

        return view('portal.sales.managesales', compact('sales'));
    }

    /**
     * Show the form for editing the specified sale.
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $services = Service::all();
        $branches = Branch::all();

        return view('portal.sales.edit', compact('sale', 'services', 'branches'));
    }

    /**
     * Update the specified sale in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:1',
            'client_name' => 'required|string|max:255',
            'client_contact' => 'required|string|max:20',
            'status' => 'required|in:pending,completed,canceled',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully!');
    }

    /**
     * Change the status of a sale.
     */
    public function changeStatus(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update(['status' => $request->status]);

        return redirect()->route('sales.index')->with('success', 'Status updated successfully!');
    }

    /**
     * Remove the specified sale from storage.
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully!');
    }

    /**
     * Print all sales as a PDF report.
     */
    public function print()
    {
        $sales = Sale::with('service', 'branch', 'user')->get();

        $pdf = Pdf::loadView('portal.sales.printsales', compact('sales'));
        return $pdf->download('sales_report.pdf');
    }
}
