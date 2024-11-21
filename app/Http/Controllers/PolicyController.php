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
}
