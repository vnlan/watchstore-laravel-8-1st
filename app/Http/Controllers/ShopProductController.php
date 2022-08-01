<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCompany;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function index(){
        $brands = ProductCompany::all();
        $products = Product::all();
        $categories = Category::all();
        return view('watch-shop.pages.product', compact('products', 'brands', 'categories'));
    }
}
