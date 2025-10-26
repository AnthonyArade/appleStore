<?php
namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $product    = Product::find($id);
        $categories = category::inRandomOrder()->limit(5)->get();
        return view('detail', compact('product', 'categories'));
    }

    public function search(Request $request)
    {
        $query      = $request->input('q');
        $categories = category::inRandomOrder()->limit(5)->get();

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->with('category')
            ->paginate(12);

        return view('search', compact('products', 'categories', 'query'));
    }
}
