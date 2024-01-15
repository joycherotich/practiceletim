<?php

namespace App\Http\Controllers;

use App\Models\CustomerNextOfKin;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerNextOfKinController extends Controller
{
    public function index()
    {
        $customerNextOfKinList = CustomerNextOfKin::all();

        return [
            "status" => 1,
            "data" => $customerNextOfKinList,
            "message" => "Success: All Customer Next of Kin details retrieved successfully",
        ];
    }

    public function getNextofKinByPhone(Request $request){
        $customer = CustomerNextOfKin::where('msisdn', $request->phone)->first();
        
        return response()->json($customer);
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'msisdn' => 'required|numeric|digits:11',
                'fullnames' => 'required|string',
                'idnumber' => 'required|numeric|',
                'phone' => 'required|numeric|digits:11',
                'relationship' => 'required|string',
            ]);

            $existingEntry = CustomerNextOfKin::where('msisdn', $request->msisdn)
                ->where('idnumber', $request->idnumber)
                ->first();

            if ($existingEntry) {
                return [
                    "status" => 201,
                    "message" => "Customer already exist"
                    // "data" => $existingEntry,
                ];
            }

            $customernextofkin = CustomerNextOfKin::create($request->all());

            return [
                "status" => 200,
                // "data" => $customernextofkin,
                "message" => "Success"
            ];
        } catch (\Exception $e) {
            \Log::error('Exception: ' . $e->getMessage());

            if ($e instanceof \Illuminate\Validation\ValidationException) {
                \Log::error('Validation Errors: ' . json_encode($e->validator->errors()));
            }

            // return [
            //     "status" => 0,
            //     "message" => "Error: Something went wrong while creating the customer details",
            // ];
        }
    }

  
    public function show(Request $request)
    {
        $phone = $request->query('phone');
    
        // Find the customer based on the phone number
        $customer = Customer::where('phone_number', $phone)->first();
    
        if (!$customer) {
            return [
                "status" => 0,
                "message" => "Error: Customer not found for phone: $phone",
            ];
        }
    
        // Retrieve the next of kin details for the specific customer
        $customerNextOfKin = $customer->nextOfKin;
    
        return [
            "status" => 1,
            "data" => $customerNextOfKin,
            "message" => "Success: Customer details retrieved successfully for phone: $phone",
        ];
    }
    
    public function getData()
    {
        $data = CustomerNextOfKin::all();
        
        return response()->json($data);
    }
    
    // public function getData($customer_id)
    // {
    //     // Validate the customer_id if needed

    //     // Retrieve the customer and their next of kin details
    //     $customerNextOfKin = CustomerNextOfKin::where('customer_id', $customer_id)->get();

    //     // Log customer_id and result for debugging
    //     \Log::info('Customer ID:', ['customer_id' => $customer_id]);
    //     \Log::info('Customer and Next of Kin Result:', ['result' => $customerNextOfKin]);

    //     // Return the data as JSON
    //     return response()->json($customerNextOfKin);
    // }

    

    public function update(Request $request, CustomerNextOfKin $customerNextOfKin)
    {
        $request->validate([
            'msisdn' => 'required|numeric|digits:11',
            'fullnames' => 'required|string',
            'idnumber' => 'required|numeric|digits:10',
            'phone' => 'required|numeric|digits:11',
            'relationship' => 'required|string',
        ]);

        $customerNextOfKin->update($request->all());
        $customerNextOfKin->save();

        return [
            "status" => 1,
            "data" => $customerNextOfKin,
            "message" => "Success: Customer details updated successfully",
        ];
    }

    public function destroy(CustomerNextOfKin $customerNextOfKin)
    {
        $customerNextOfKin->delete();
        return [
            "status" => 1,
            "data" => $customerNextOfKin,
            "message" => "Success: Customer Next of Kin Details deleted successfully",
        ];
    }
}
