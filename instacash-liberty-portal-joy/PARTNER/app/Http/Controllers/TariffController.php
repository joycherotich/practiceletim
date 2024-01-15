<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentCycle;

class TariffController extends Controller
{
    
    public function index()
    {
        $paymentCycles = PaymentCycle::all();

        return view('tariff.index', compact('paymentCycles'));
    }

    public function create()
    {
        return view('tariff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_cycle_name' => 'required|string|unique:payment_cycles',
            'amount' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        PaymentCycle::create([
            'payment_cycle_name' => $request->payment_cycle_name,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);

      
        $paymentCycles = PaymentCycle::all();

        return view('tariff.index', compact('paymentCycles'));

    }

    public function edit($id)
    {
        $paymentCycle = PaymentCycle::findOrFail($id);

        return view('tariff.edit', compact('paymentCycle'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'payment_cycle_name' => 'required|string|unique:payment_cycles,payment_cycle_name,' . $id,
        'amount' => 'required|numeric',
        'status' => 'required|boolean',
    ]);

    $paymentCycle = PaymentCycle::findOrFail($id);
    $paymentCycle->update([
        'payment_cycle_name' => $request->payment_cycle_name,
        'amount' => $request->amount,
        'status' => $request->status,
       
    ]);

    return redirect()->route('tariff.index')->with('success', 'Payment cycle updated successfully.');
}



    public function destroy($id)
    {
        PaymentCycle::findOrFail($id)->delete();

        return redirect()->route('tariff.index')->with('success', 'Payment cycle deleted successfully.');
    }
}