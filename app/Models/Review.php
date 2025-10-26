<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['product_id', 'author_name', 'rating', 'comment'];
    protected $casts    = [
        'rating' => 'integer',
    ];
// Relation : Un avis appartient à un produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
