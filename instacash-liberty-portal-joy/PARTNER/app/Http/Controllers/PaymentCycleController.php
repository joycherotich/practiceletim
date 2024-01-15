<?php

namespace App\Http\Controllers;

use App\Models\PaymentCycle;
use Illuminate\Http\Request;

class PaymentCycleController extends Controller
{
    public function index()
    {
        $paymentCycles = PaymentCycle::all();
        return response()->json($paymentCycles);
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cycle_name' => 'required',
            'cycle_amount' => 'required|numeric',
            'cycle_code' => 'required|unique:payment_cycles',
        ]);
    
        $paymentCycle = PaymentCycle::create($validatedData);
    
        return response()->json($paymentCycle, 201);
    }
    public function show(PaymentCycle $paymentCycle)
    {
        return response()->json(compact('paymentCycle'));
    }

    public function edit(PaymentCycle $paymentCycle)
    {
        return response()->json(compact('paymentCycle'));
    }

    public function update(Request $request, PaymentCycle $paymentCycle)
    {

        $paymentCycle->update($request->all());

        return redirect()->route('payment-cycles.index')
            ->with('success', 'Payment_Cycle updated successfully');
    }

    public function destroy(PaymentCycle $paymentCycle)
    {
        $paymentCycle->delete();

        return redirect()->route('payment-cycles.index')
            ->with('success', 'Payment_Cycle deleted successfully');
    }
}
