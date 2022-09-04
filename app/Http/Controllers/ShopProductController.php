<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCompany;

use Illuminate\Http\Request;

class ShopProductController extends Controller

{
    private $product;
    private $productCompany;
    
    public function __construct()
    {
        $this->product = new Product;
        $this->productCompany = new ProductCompany;
    }
    public function index(){
        $brands = $this->productCompany->all();
        $products = $this->product->all();
        return view('watch-shop.pages.product', compact('products', 'brands'));
    }

    public function detail($id){
   
        $product = $this->product->find($id);
        return view('watch-shop.pages.product-detail', compact('product'));
    }
    public function newest(){
        
        $newestProducts = $this->product->latest()->take(5)->get();
        return view('watch-shop.home', compact('newestProducts'));
    }
    public function oldest(){
        
        $oldestProducts = $this->product->all()->take(10);;
        return view('watch-shop.home', compact('oldestProducts'));
    }
}
