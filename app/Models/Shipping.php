<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{

    protected $table = 'shipping_id';
    protected $primaryKey = 'shipping_id';

    protected $fillable = [
        'order_id',
        'customer_name',
        'email',
        'address',
        'zip_code'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
