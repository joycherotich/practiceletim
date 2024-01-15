<?php

namespace App\Http\Controllers;
use App\Models\CustomerPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http; // Add this line

class ProfileController extends Controller
{
    
    public function index()
    {
        // Hardcoded balance for demonstration
        $accountBalance = CustomerPayment::sum('amount');

        return view('profile', compact('accountBalance'));
    }
    private function getAccountDetails()
    {
        try {
            $response = Http::get('http://108.175.14.115:8080/instacashCore/api/Transaction/GetBillerWalletBalance');
    
            if ($response->successful()) {
                return $response->json();
            } else {
                return ['error' => 'Failed to fetch account details. Server returned: ' . $response->status()];
            }
        } catch (\Exception $e) {
            return ['error' => 'Failed to fetch account details. ' . $e->getMessage()];
        }
    }

    public function changePassword(Request $request)
{
    // Validate the form data
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|different:current_password',
        'new_password_confirmation' => 'required|same:new_password',
    ]);

    // Check if the user is logged in
    if (Auth::check()) {
        // Get the current user
        $user = Auth::user();

        // Check if the current password matches the user's password
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }

        // Update the user's password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        // Attempt to re-authenticate the user with the updated credentials
        if (Auth::attempt(['email' => $user->email, 'password' => $request->input('new_password')])) {
            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to re-authenticate the user after password change.');
        }
    }

    // If the user is not logged in, redirect to the login page
    return redirect()->route('login')->with('error', 'User not logged in. Please log in to change the password.');
}

    // Add the appropriate namespace for your User model


    public function updateAccountDetails(Request $request)
    {
        $user = Auth::user();

        if ($request->has('name')) {
            $user->update(['name' => $request->name]);
        }

        if ($request->has('email')) {
            $user->update(['email' => $request->email]);
        }

        return back()->with('success', 'Account details updated successfully.');
    }
}
