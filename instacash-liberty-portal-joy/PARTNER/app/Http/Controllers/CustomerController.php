<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index()
    {
      
        
        $customers = Customer::all();
        return view('customers.customers_statement', compact('customers'));
    }

    public function reports()
    {
       
        $billers = Customer::all();
        return view('biller.biller_account', compact('billers'));
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function store(Request $request)
    {
    
        $customer = Customer::create($request->all());
    
        return response()->json($customer);
    }
    public function updatePolicy(Request $request)
    {
        // Validate the request
        $request->validate([
            'policy_number' => 'required|string|max:255',
            'customer_id' => 'required|numeric',
        ]);

        // Update the customer's policy number
        $customer = Customer::find($request->customer_id);
        $customer->policy_number = $request->policy_number;
        $customer->save();

        return response()->json(['message' => 'Policy updated successfully']);
    }

    public function savePolicy(Request $request)
    {
        // Validate the request
        $request->validate([
            'policy_number' => 'required|string|max:255',
            'customer_id' => 'required|numeric',
        ]);

        // Save the policy for the customer
        Customer::where('id', $request->customer_id)
            ->update(['policy_number' => $request->policy_number]);

        return response()->json(['message' => 'Policy saved successfully']);
    }



//   public function updatePolicy(Request $request)
// {
//     try {
//         $request->validate([
//             'policy_number' => 'required|string|max:255',
//             // 'customer_id' => 'required|numeric',
//         ]);

//         // Your logic to update the policy

//         return response()->json(['success' => true, 'message' => 'Policy updated successfully']);
//     } catch (\Exception $e) {
//         // Log the error
//         \Log::error($e);

//         return response()->json(['success' => false, 'message' => 'An error occurred while updating the policy'], 500);
//     }
// }
    public function destroy(Customer $customer)
    {
        $customer->delete();
    
        return response()->json(null, 204);
    }
}
