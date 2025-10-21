<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
     use HasFactory;

    protected $fillable = [
        'categorie_id',
        'name', 
        'image',
        'description',
        'new',
        'price',
        'color'
    ];

    protected $casts = [
        'color' => 'array',
    ];
    
}
