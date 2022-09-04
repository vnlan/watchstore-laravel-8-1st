@extends('admin.layouts.admin-layout')

@section('title')
<title>Thêm vai trò</title>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', ['name' => 'Đơn hàng chưa đăng kí','key'=> 'Sửa'])
    <!-- /.content-header -->
    @section('js')

    <script type="text/javascript" src="{{ asset('js/admin-page/role/add.js') }}"></script>

    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form action="{{route('orders-not-registered.update',['id' => $order->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" value="{{$order->first_name}}" name="first_name" disabled required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" value="{{$order->last_name}}" name="last_name" disabled required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Company Name (Optional)</label>
                                        <input type="text" class="form-control" value="{{$order->company_name}}" disabled name="company_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleFormControlSelect1">Trạng thái</label>
                                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                                            <option value="1" {{( $order->status == 1) ? 'selected' : '' }}>Chưa duyệt</option>
                                            <option value="2" {{( $order->status == 2) ? 'selected' : '' }}>Đã duyệt</option>
                                            <option value="3" {{( $order->status == 3) ? 'selected' : '' }}>Đang vận chuyển</option>
                                            <option value="4" {{( $order->status == 4) ? 'selected' : '' }}>Đã hoàn thành</option>
                                            <option value="5" {{( $order->status == 5) ? 'selected' : '' }}>Đã hủy</option>
                                        </select>
                                    </div>

                                </div>
                                <label>Country *</label>
                                <input type="text" class="form-control" value="{{$order->country}}" disabled name="country" required>
                                <div class="form-group">

                                    <label>Street address *</label>
                                    <input type="text" class="form-control" value="{{$order->street_address}}" name="street_address" disabled placeholder="House number and Street name" required>
                                    <!-- <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required> -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Town / City *</label>
                                            <input type="text" class="form-control" value="{{$order->town_city}}" name="town_city" disabled required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>State / County *</label>
                                            <input type="text" class="form-control" value="{{$order->country}}" name="country" disabled required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode / ZIP *</label>
                                            <input type="text" class="form-control"  value="{{$order->postcode_zip}}" name="postcode_zip" disabled required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone number *</label>
                                            <input type="tel" class="form-control" value="{{$order->phone_number}}" name="phone_number" disabled required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" value="{{$order->email}}" name="email" disabled required>



                                    <label>Order notes (optional)</label>
                                    <textarea class="form-control" cols="30" rows="4" name="note" disabled placeholder="Notes about your order, e.g. special notes for delivery">{{$order->note}}</textarea>
                                </div><!-- End .col-lg-9 -->
                                <button type="submit" class="btn btn-primary">
                                    <span class="btn-text">Update Order</span>
                                   
                                </button>
                            </div><!-- End .row -->
                    </form>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã SP</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                         
                        </tr>   
                        </thead>
                        <tbody>
                        @foreach($order->orderDetail as $orderDetail)
                        <tr>
                            <td>{{ $orderDetail->product_id}}</td>
                            <td>{{ $orderDetail->amount }}</td>
                            <td>{{ $orderDetail->quantity}}</td>
                            <td>{{ $orderDetail->total }}</td>
                          
                        </tr>
                        @endforeach
                        <tr class="text-left" colspan="2">
                            <td >Tổng: {{$order->total}} đ</td>
                        
                        </tr>
                        </tbody>
                </table>
            
           
          
        
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection