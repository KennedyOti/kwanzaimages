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
     * Display a listing of the sales with pagination.
     */
    public function index()
    {
        // Paginate the sales data with 10 records per page
        $sales = Sale::with('service', 'branch', 'user')->paginate(9);

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
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update([
            'service_id' => $request->service_id,
            'branch_id' => $request->branch_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully!');
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

    public function print()
    {
        $sales = Sale::with('service', 'branch', 'user')->get();

        $pdf = Pdf::loadView('portal.sales.printsales', compact('sales'));
        return $pdf->download('sales_report.pdf');
    }
}
