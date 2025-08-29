<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuSection extends Model
{
    protected $fillable = ['name','discount','image'];

    public function items()
    {
        return $this->hasMany(MenuItem::class,'menu_section_id');
    }
}
