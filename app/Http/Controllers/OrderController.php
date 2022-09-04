<?php

namespace App\Http\Controllers;

use App\Models\OrderDetailNotRegistered;
use App\Models\OrderNotRegistered;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderNotRegistered;
    private $orderDetailNotRegistered;
    public function __construct()
    {
        $this->middleware('auth');
        $this->orderNotRegistered = new OrderNotRegistered;
        $this->orderDetailNotRegistered = new OrderDetailNotRegistered; 
        
    }
    public function allNROrders()
    {
        $orders = $this->orderNotRegistered->latest()->paginate(5);
        // $carts = Cart::content();
        // $cartTotal = Cart::total();
        // $cartSubtotal = Cart::subtotal();
        return view('admin.manage.orders-not-registered.index', compact('orders'));
    }
    public function editNROrder($id)
    {
        // $orderDetail = $this
        $order = $this->orderNotRegistered->find($id);
        return view('admin.manage.orders-not-registered.edit', compact('order'));
      
    }
    public function checkNROrder($id)
    {
        $orderFound = $this->orderNotRegistered->find($id);
        if($orderFound->status < 4 ){
            $orderFound->update([
                'status' => ($orderFound->status) + 1
            ]);
            return redirect()->route('orders-not-registered.all');
        }else{
            return redirect()->route('orders-not-registered.all');
        }
       
        // $carts = Cart::content();
        // $cartTotal = Cart::total();
        // $cartSubtotal = Cart::subtotal();
      
    }
    public function denyNROrder($id)
    {
        $orderFound = $this->orderNotRegistered->find($id);
        
            $orderFound->update([
                'status' => 5
            ]);
 
            return redirect()->route('orders-not-registered.all');
        
       
        // $carts = Cart::content();
        // $cartTotal = Cart::total();
        // $cartSubtotal = Cart::subtotal();
      
    }
    public function updateNROrder(Request $request, $id)
    {
            $data= [
                'status' => $request->status
            ];
        
            $this->orderNotRegistered->find($id)->update($data);
 
            return redirect()->route('orders-not-registered.all');
        
       
        // $carts = Cart::content();
        // $cartTotal = Cart::total();
        // $cartSubtotal = Cart::subtotal();
      
    }

}
