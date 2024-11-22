<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class ManageBranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('portal.branches', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
        ]);

        Branch::create($request->only('name', 'location', 'contact'));

        return redirect()->back()->with('success', 'Branch created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
        ]);

        $branch = Branch::findOrFail($id);
        $branch->update($request->only('name', 'location', 'contact'));

        return redirect()->back()->with('success', 'Branch updated successfully!');
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        return redirect()->back()->with('success', 'Branch deleted successfully!');
    }
}
