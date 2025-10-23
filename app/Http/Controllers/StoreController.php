<?php
namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;

class StoreController extends Controller
{
    public function index()
    {
        $products   = Product::All();
        $categories = category::inRandomOrder()->limit(5)->get();
        return view('index', compact('products', 'categories'));
    }

    public function show(string $id)
    {
        //selection du produit a partir de son identifiant
        $product = Product::find($id);
        $categories = category::inRandomOrder()->limit(5)->get();
        return view('detail',compact('product','categories'));
    }
}
