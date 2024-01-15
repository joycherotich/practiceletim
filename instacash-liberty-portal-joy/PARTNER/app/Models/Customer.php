<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=[
        "fullnames",
        "email",
        "phone_number",
        "id_number",
        "policy_number",
    ];


}


