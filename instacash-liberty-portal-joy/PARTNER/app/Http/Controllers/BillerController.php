<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biller; // Assuming your Biller model is in the App\Models namespace

class BillerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $billers = Customer::all();
        return view('biller.biller_statement', compact('billers'));
    }
    
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'location' => 'required',
            'phone' => 'required',
            // Add other validation rules as needed
        ]);

        $biller = Biller::create($request->all());

        return redirect()->route('billers.show', $biller)
            ->with('success', 'Biller created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biller  $biller
     * @return \Illuminate\Http\Response
     */
    public function show(Biller $biller)
    {
        return view('billers.show', compact('biller'));
    }

    /**
     * Custom method for handling /biller/account endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('biller.biller_account');
    }

}
