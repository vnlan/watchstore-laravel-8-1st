
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('css')
 <link rel="stylesheet" href="{{ asset('css/admin-page/product/index/product-index.css') }}">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('js/reuseable/sweetalert2.js') }}"></script>
        


@endsection



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Sản phẩm','key'=> 'Tất cả'])
        <!-- /.content-header -->
       

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Thêm sản phẩm</a>
                    </div>
                    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh đại diện</th>
                            <th>Danh mục</th>
                            <th>Hãng sản xuất</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ $product->feature_image_path }}" alt="Empty!" width="150" height="100" class="img-custom"></td>
                            <td>{{ optional($product->categories)->name }}</td>
                            <td>{{ $product->companies->company_name }}</td>
                            <td>{{ number_format($product->price) }} đ</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <button  class="btn btn-success" id="" href="#" >
                                <i class="fa-solid fa-eye"></i>
                                </button>
                              
                                <a type="button" href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <button  class="btn btn-danger action-delete" id="btnPopupDelete" href="#" data-toggle="modal" data-target="" >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                              
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                    <div class="col-md-12">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection
