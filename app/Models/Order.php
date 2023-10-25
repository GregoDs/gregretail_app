<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'payment_method',
        'payment_status',
        'address',
    ];

}
