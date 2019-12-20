<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function allProducts(){
        $products = Product::query()->get();
        return view('main', compact('products'));
    }
}
