<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $branches = Branch::all();
        $sales = Sale::with('service', 'branch', 'user')->get();

        return view('portal.sales', compact('services', 'branches', 'sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:1',
        ]);

        Sale::create([
            'service_id' => $request->service_id,
            'branch_id' => $request->branch_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Sale recorded successfully!');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->back()->with('success', 'Sale deleted successfully!');
    }
}
