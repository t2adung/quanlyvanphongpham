<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function order()
    {
        return $this->belongsTo('App\Order', 'id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'id', 'product_id');
    }
}