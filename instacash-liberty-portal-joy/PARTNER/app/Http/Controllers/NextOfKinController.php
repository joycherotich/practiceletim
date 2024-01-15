<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NextOfKinController extends Controller
{
    public function show($id)
    {
        $nextOfKin = NextOfKin::where('customer_id', $id)->first();

        return response()->json($nextOfKin);
    }
}