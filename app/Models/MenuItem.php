<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_section_id',
        'name',
        'description',
        'price',
        'size',
        'image',
        'additional_image_1',
        'additional_image_2',
    ];

    public function section()
    {
        return $this->belongsTo(MenuSection::class, 'menu_section_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    public function getRatingCountAttribute()
    {
        return $this->ratings()->count();
    }
}
