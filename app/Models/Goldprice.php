<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goldprice extends Model
{
    protected $fillable =[
        'metal_type',
        'price_per_tola'
    ];
}
