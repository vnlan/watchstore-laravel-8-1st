<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNotRegistered extends Model
{
    protected $table = 'orders_not_registered';
    protected $guarded = ['id'];

    public function orderDetail()
    {
       return $this->hasMany(OrderDetailNotRegistered::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
