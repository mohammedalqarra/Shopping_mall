<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // protected $guarded = []; // الحقول الممنوعة
    protected $fillable = [
        'name',
        'image',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault(); // في حال حذفت العنصر إلي معه ما يعطيني error
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id'); // كل الأبناء إلي مع ال parent
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function getTransNameAttribute()
    {
        if ($this->name) {
            return json_decode($this->name, true)[app()->currentLocale()];
        }
        return $this->name;
    }
    public function getNameEnAttribute()
    {
        if ($this->name) {
            return json_decode($this->name, true)['en'];
        }
        return $this->name;
    }
    // public function getNameArAttribute()
    // {
    //     if ($this->name) {
    //         return json_decode($this->name, true)['ar'];
    //     }
    //     return $this->name;
    // }

    protected function NameAr(): Attribute
    {
        return Attribute::make(
            get: fn () => ucfirst(json_decode($this->name, true)['ar']),
        );
    }
}