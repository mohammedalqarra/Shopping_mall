<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function carts()
    {
        return $this->hasMany(cart::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}