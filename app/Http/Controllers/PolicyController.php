<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        return view('policies.index');
    }

    public function create()
    {
        return view('policies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'policy_number' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'policy_type' => 'string|max:255',
            'status' => 'string|max:255',
            'premium_amount' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Policy::create($validated);

        return redirect()->route('policies');
    }
}
