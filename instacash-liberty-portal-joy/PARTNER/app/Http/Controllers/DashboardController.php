<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPayment;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function dashboard()
{
    // Fetch the customer count
    $customerCount = Customer::count();

    $accountBalance = CustomerPayment::sum('amount');

   
    $customerPayments = CustomerPayment::orderBy('paymentdate', 'desc')
        ->take(5) 
        ->get();

    // Pass the variables to the view
    return view('dashboard', compact('customerCount', 'accountBalance', 'customerPayments'));
}



    public function __invoke()
    {
        return $this->dashboard();
    }
}