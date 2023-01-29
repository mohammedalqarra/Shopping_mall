<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // public function payments()
    // {
    //     return $this->hasMany(Payment::class);
    // }
}
