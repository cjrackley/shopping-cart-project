<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItem extends Model
{
    protected $primaryKey = 'order_item_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'p_id',
        'quantity',
        'unit_price'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'p_id');
    }
}
