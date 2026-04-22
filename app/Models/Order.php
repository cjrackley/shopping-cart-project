<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'date',
        'status',
        'total_amount'
    ];

    public function items() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function shipping() {
        return $this->hasOne(Shipping::class, 'order_id');
    }
}
