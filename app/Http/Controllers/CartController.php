<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $product;


    public function __construct()
    {
        $this->product = new Product;
  

    }
    public function add($id)
    {
        $product = $this->product->find($id);
        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => [
                'feature_image' => $product->feature_image_path
            ]
            
        ]);
        // dd(Cart::content());
        return back();
    }
    public function index()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartSubtotal = Cart::subtotal();
        return view('watch-shop.pages.cart', compact('carts', 'cartTotal', 'cartSubtotal'));
    }
    public function delete($rowId)
    {

       Cart::remove($rowId);
       return back();
    }

}
