<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $primaryKey = 'order_item_id';
    public $incrementing = true;

    protected $fillable = [
        'order_id',
        'p_id',
        'quantity',
        'unit_price'
    ];

    public function product() {
        return $this->belongsTo(product::class, 'p_id');
    }
}
