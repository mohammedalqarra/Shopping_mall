<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id')->withDefault();
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
    public function album()
    {
        return $this->hasMany(Image::class);
    }
    // public function getTransNameAttribute()
    // {
    //     if ($this->name) {
    //         return json_decode($this->name, true)[app()->currentLocale()];
    //     }
    //     return $this->name;
    // }
    // public function getNameEnAttribute()
    // {
    //     if ($this->name) {
    //         return json_decode($this->name, true)['en'];
    //     }
    //     return $this->name;
    // }
    // public function getNameArAttribute()
    // {
    //     if ($this->name) {
    //         return json_decode($this->name, true)['ar'];
    //     }
    //     return $this->name;
    // }
}