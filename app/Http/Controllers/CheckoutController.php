<?php

namespace App\Http\Controllers;

use App\Models\OrderDetailNotRegistered;
use App\Models\OrderNotRegistered;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    private $orderNotRegistered;
    private $orderDetailNotRegistered;
    public function __construct()
    {
        $this->orderNotRegistered = new OrderNotRegistered;
        $this->orderDetailNotRegistered = new OrderDetailNotRegistered; 
    }
    public function index()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartSubtotal = Cart::subtotal();
        return view('watch-shop.pages.checkout', compact('carts', 'cartTotal', 'cartSubtotal'));
    }

    public function addNotRegisteredOrder(Request $request)
    {
        //1.Thêm đơn hàng
        $newOrder = $this->orderNotRegistered->create($request->all());
        //2.Thêm chi tiết đơn
        $carts = Cart::content();
        foreach ($carts as $cart ) {
            $data = [
                'order_id' => $newOrder->id,
                'product_id' => $cart->id,
                'quantity' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,

            ];
            $this->orderDetailNotRegistered->create($data);
        }
        // $subtotal = Cart::subtotal();
        // $total = Cart::total();
        // $this->sendEmail($newOrder,$total, $subtotal);
        //3.Xóa giỏ hàng
        Cart::destroy();
        //4.Trả về kết quả
        return redirect()->route('shop.products.all');
    }

    public function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;
        Mail::send('watch-shop.pages.email',compact('order','total','subtotal'), function($message) use ($email_to){
            $message->from('langanktem@gmail.com','TinaWatch Shop');
            $message->to($email_to, $email_to);
            $message->subject('Order Placed');
        });
    }
}
