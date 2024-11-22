<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::latest()->paginate(10);
        return view('policies.index', compact('policies'));
    }

    public function show($id)
    {
        $policy = Policy::where('id', $id)->first();
        return view('policies.view', compact('policy'));
    }

    public function create()
    {
        return view('policies.create');
    }

    public function edit($id)
    {
        $policy = Policy::where('id', $id)->first();
        return view('policies.edit', compact('policy'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'policy_number' => 'required|string|max:100',
            'customer_name' => 'required|string|max:255',
            'policy_type' => 'required|in:Life,Health,Auto,Property,Travel',
            'status' => 'required|in:Active,Pending,Expired',
            'premium_amount' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Policy::create($validated);

        return redirect()->route('policies');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'policy_number' => 'string|max:100',
            'customer_name' => 'string|max:255',
            'policy_type' => 'required|in:Life,Health,Auto,Property,Travel',
            'status' => 'required|in:Active,Pending,Expired',
            'premium_amount' => 'string|max:255',
            'start_date' => 'date',
            'end_date' => 'date',
        ]);

        $policy = Policy::where('id', $id)->first();
        $policy->update($validated);

        return redirect()->route('policies');
    }

    public function destroy($id)
    {
        $policy = Policy::where('id', $id)->first();
        $policy->delete();
        return redirect()->route('policies');
    }

    public function api(Request $request)
    {

        try {
            $validated = $request->validate([
                'policy_type' => 'sometimes|in:Life,Health,Auto,Property,Travel',
                'policy_status' => 'sometimes|in:Active,Pending,Expired',
                'start_date' => 'sometimes|date',
                'end_date' => 'sometimes|date|after_or_equal:start_date',
            ]);

            $query = Policy::query();

            if ($request->filled('policy_type')) {
                $query->where('policy_type', $validated['policy_type']);
            }

            if ($request->filled('policy_status')) {
                $query->where('status', $validated['policy_status']);
            }

            if ($request->filled('start_date')) {
                $query->whereDate('start_date', $validated['start_date']);
            }

            if ($request->filled('end_date')) {
                $query->whereDate('end_date', '<=', $validated['end_date']);
            }


            $policies = $query->get();

            return response()->json([
                'status' => 'success',
                'data' => $policies,
                'message' => 'Policies retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error retrieving policies: ' . $e->getMessage()
            ], 500);
        }
    }
}
