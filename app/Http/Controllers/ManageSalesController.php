<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ManageSalesController extends Controller
{
    /**
     * Display a listing of the sales with DataTables.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->getSalesData($request);
        }
        return view('portal.sales.managesales');
    }

    /**
     * Fetch sales data for DataTables.
     */
    private function getSalesData(Request $request)
    {
        $query = Sale::with('service', 'branch', 'user');

        // Apply multi-column search
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchTerm = $request->search['value'];
            $query->where(function ($q) use ($searchTerm) {
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
            });
        }

        return DataTables::of($query)
            ->addColumn('actions', function ($sale) {
                $actions = '';
                if (Auth::user()->role === 'admin') {
                    $actions .= '<a href="' . route('sales.edit', $sale->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                    $actions .= '<form action="' . route('sales.destroy', $sale->id) . '" method="POST" style="display:inline;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>';
                }
                return $actions;
            })
            ->addColumn('status', function ($sale) {
                return '<select class="form-select status-select" data-id="' . $sale->id . '">
                            <option value="pending" ' . ($sale->status === 'pending' ? 'selected' : '') . '>Pending</option>
                            <option value="completed" ' . ($sale->status === 'completed' ? 'selected' : '') . '>Completed</option>
                            <option value="canceled" ' . ($sale->status === 'canceled' ? 'selected' : '') . '>Canceled</option>
                        </select>';
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    /**
     * Change the status of a sale via AJAX.
     */
    public function changeStatus(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update(['status' => $request->status]);

        return response()->json(['success' => 'Status updated successfully!']);
    }

    // Other methods (edit, update, destroy, print) remain unchanged
}
