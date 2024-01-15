<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    use HasFactory; 
    protected $fillable = [
       'paymentdate',
       'customerphone',
       'customername',
       'amount',
       'paymentreference',
       'paymentplan'

    ];

   
    }
