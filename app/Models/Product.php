<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
     use HasFactory;

    protected $fillable = [
        'category_id',
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
    // liaison des categories avec le produits
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
