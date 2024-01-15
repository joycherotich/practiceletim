<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Valid credentials, user is authenticated
            return redirect('/dashboard')->with('success', 'Login successful');
        } else {
            // Invalid credentials
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    public function dashboard()
    {
        return view('dashboard'); // Assuming you have a login.blade.php view
    }

    public function __invoke()
    {
        return view('dashboard');
    }
}
