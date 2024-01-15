<?php

namespace App\Http\Controllers;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
   public function create()
    {
        return view('policies.create');
    }

    public function store(Request $request)
    {
        // Validate the form data (customize as needed)
        $request->validate([
            'policy_number' => 'required|unique:policies,policy_number',
           
          
        ]);

        // Create a new policy using Eloquent model
        $policy = Policy::create([
            'policy_number' => $request->input('policy_number'),
            // Add more fields...
        ]);

        // Redirect to a success page or do something else
        return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    }
}
