<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 ADD THIS
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
    'customer_name',
    'metal_type',
    'price_per_tola',
    'quantity',
    'total',
];
}
