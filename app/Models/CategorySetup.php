<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySetup extends Model
{
    use HasFactory;
    protected $table = "categorysetup";
    protected $primaryKey = "categorycode";
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'categorycode',
        'categoryname',
        'branchcode',
        'itempic',
    ];
}
