<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index(){
        return view('watch-shop.pages.shopping-cart');
    }

    public function checkout(){
        return view('watch-shop.pages.checkout');
    }
}
