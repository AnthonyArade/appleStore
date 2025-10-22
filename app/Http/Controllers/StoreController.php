<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;



class StoreController extends Controller
{
    public function index(){
        $products = Product::All();
        $categories = category::inRandomOrder()->limit(5)->get();
        return view('index',compact('products','categories'));
    }
}
