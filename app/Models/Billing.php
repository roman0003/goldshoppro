<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Billing extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'customer_id',
        'metal_type',
        'price_per_tola',
        'quantity',
        'total',
    ];
 
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}