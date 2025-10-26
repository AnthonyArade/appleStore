<?php
namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'stock',
        'color',
    ];

    protected $casts = [
        'color' => 'array',
    ];

    public function getColorAttribute($value)
    {
        // Decode the JSON stored in the DB
        $array = json_decode($value, true) ?? [];

        // Return the full key => value array
        return $array;
    }

// Convert array of keys back to full JSON with Tailwind classes
    public function setColorAttribute($value)
    {
        // Define your Tailwind classes
        $allowedColors = [
            'Black'        => 'bg-gray-900',
            'Blue'         => 'bg-blue-500',
            'Silver'       => 'bg-gray-300',
            'Purple'       => 'bg-purple-500',
            'Gray'         => 'bg-gray-500',
            'White'        => 'bg-white',
            'Red'          => 'bg-red-500',
            'Green'        => 'bg-green-400',
            'Pink'         => 'bg-pink-400',
            'Beige'        => 'bg-yellow-100',
            'Brown'        => 'bg-amber-800',
            'Yellow'       => 'bg-yellow-400',
            'Amber'        => 'bg-amber-400',
            'Gold'         => 'bg-yellow-500',
            'Lime'         => 'bg-lime-400',
            'Blue Light'   => 'bg-blue-300',
            'Blue Dark'    => 'bg-blue-600',
            'Gray Light'   => 'bg-gray-100',
            'Gray Dark'    => 'bg-gray-800',
            'Green Light'  => 'bg-green-300',
            'Purple Light' => 'bg-purple-400',
            'Amber Dark'   => 'bg-amber-700',
        ];

        $this->attributes['color'] = json_encode(
            collect($value)->mapWithKeys(fn($cssClass, $colorName) => [
                $colorName => $allowedColors[$colorName] ?? $cssClass,
            ])->toArray(),
        );
    }

    // liaison des categories avec le produits
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
