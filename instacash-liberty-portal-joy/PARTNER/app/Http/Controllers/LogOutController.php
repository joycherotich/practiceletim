<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Import the Session facade

class LogOutController extends Controller
{
    /**
     * Log out the user and redirect to the login page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        Session::flush();
        return redirect('/login');
    }
}
