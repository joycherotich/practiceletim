<?php

namespace App\Http\Controllers;

use App\Models\CustomerPayment;
use Illuminate\Http\Request;

class CustomerPaymentController extends Controller
{
   
    public function index()
    {
        //get details from core 
        //store in a variable 
        //pass to the view compact

        $customerPayments = CustomerPayment::all();
        return view('customers.customer_payment', compact('customerPayments'));
    }

    public function reports()
    {
        
        //get details from core 
        //store in a variable 
        //pass to the view compact
        
        $customerPayments = CustomerPayment::all();
        return view('biller.biller_statement', compact('customerPayments'));
    }

    public function showCustomerPayments()
    {
        // Fetch or generate your data here
        $customerPayments = CustomerPayment::where('some_column', '=', 'some_value')->get();

        dd($customerPayments); // This will print the data and stop execution

        return view('customers.customer_payment', compact('customerPayments'));
    }
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'customers_id' => 'required|exists:customers,id',
        //     'paymentcycles_id' => 'required|exists:paymentcycle,id',
        //     'full_name' => 'required',
        //     'email' => 'required|email',
        //     'phone_number' => 'required',
        //     'id_number' => 'required',
        //     'amount' => 'required|numeric',
        //     'payment_reference' => 'required',
        // ]);

        $customerPayment = CustomerPayment::create($request->all());

        return response()->json($customerPayment, 201);
    }

    public function show(CustomerPayment $customerPayment)
    {
        return response()->json($customerPayment);
    }

    public function update(Request $request, CustomerPayment $customerPayment)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'paymentcycle_id' => 'required|exists:paymentcycles,id',
            'fullname' => 'required',
            'email' => 'required|email',
            'customerphone' => 'required',
            'id_number' => 'required',
            'amount' => 'required|numeric',
            'payment_reference' => 'required',
        ]);

        $customerPayment->update($validatedData);

        return response()->json($customerPayment);
    }

    public function destroy(CustomerPayment $customerPayment)
    {
        $customerPayment->delete();

        return response()->json(null, 204);
    }

    public function sumCustomerPayments()
    {
        $totalAmount = DB::table('customer_payments')->sum('amount');

        return response()->json(['total_amount' => $totalAmount]);
    }



}
