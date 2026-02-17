<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','phone','email'];

    public function billings()
    {
        return $this->hasMany(Billing::class);
    }
}
