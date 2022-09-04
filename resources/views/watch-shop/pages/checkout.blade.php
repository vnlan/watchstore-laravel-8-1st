
@extends('watch-shop.layouts.shop-layout')

@section('shop-content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
               
                <form action="{{route('shop.checkout.add-nr-order')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        <input type="hidden" value="1" name="status">
                        <input type="hidden" value="{{Cart::total()}}" name="total">
                            <label>Company Name (Optional)</label>
                            <input type="text" class="form-control" name="company_name">

                            <label>Country *</label>
                            <input type="text" class="form-control" name="country" required>

                            <label>Street address *</label>
                            <input type="text" class="form-control" name="street_address" placeholder="House number and Street name" required>
                            <!-- <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required> -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <input type="text" class="form-control" name="town_city" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>State / County *</label>
                                    <input type="text" class="form-control" name="country" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" class="form-control" name="postcode_zip" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone number *</label>
                                    <input type="tel" class="form-control" name="phone_number" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Email address *</label>
                            <input type="email" class="form-control" name="email" required>

                           

                            <label>Order notes (optional)</label>
                            <textarea class="form-control" cols="30" rows="4" name="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($carts as $cart)
                                        <tr>
                                            <td><a href="#">{{$cart->name}}</a><span> x {{$cart->qty}}</span></td>
                                            <td>{{number_format($cart->price * $cart->qty)}} đ</td>
                                        </tr>
                                        @endforeach
               
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{number_format((int)Cart::subtotal())}} đ</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>{{number_format((int)Cart::total())}} đ</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <input type="radio" name="payment_type" value="online_payment" role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1" checked>
                                                    Online payment
                                                </input>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                    <p class="my-5"></p>
                                    
                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="card-title">
                                                <input type="radio" class="collapsed" name="payment_type" value="ship_cod" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                    Ship COD
                                                </input>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Cash On Delivery
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                  

                     
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection