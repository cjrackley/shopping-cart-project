<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primarykey = 'p_id';

    protected $fillable = [
        'sku',
        'name',
        'description',
        'price',
        'img_url'
    ];

    public function GetRouteKeyName(){
        return 'p_id';
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'p_id');
    }
}
