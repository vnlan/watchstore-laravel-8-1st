
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin-page/product/index/product-index.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Hãng sản xuất','key'=> 'Tất cả'])
        <!-- /.content-header -->
     


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product-company.create') }}" class="btn btn-success float-right m-2">Thêm Hãng sản xuất</a>
                    </div>
                    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên thương hiệu</th>
                            <th>Logo</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productCompanies as $productCompany)
                        <tr>
                            <td>{{ $productCompany->id }}</td>
                            <td>{{ $productCompany->company_name }}</td>
                            <td>
                                <img src="{{ $productCompany->logo_image_path }}" width="150" height="100" class="img-custom">
                            </td>
                            <td>
                                <button  class="btn btn-success" id="" href="#" data-toggle="modal" data-target="">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <a type="button" href="{{ route('product-company.edit', ['id' => $productCompany->id]) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <button  class="btn btn-danger" id="btnPopupDelete" href="#" data-toggle="modal" data-target="#deleteModal_{{$productCompany->id}}" value="{{ $productCompany->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                               
                            </td>
                           
                        </tr>

                         <!-- Modal -->
                         <div class="modal fade" id="deleteModal_{{$productCompany->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa danh mục</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    Bạn có chắc muốn xóa Hãng sản xuất <span class=""> {{ $productCompany->company_name }} </span>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <a id="btnDeleteCategory" type="button" href="{{ route('product-company.delete', ['id' => $productCompany->id]) }}" class="btn btn-danger">Xóa</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        @endforeach
                           
             
                        </tbody>
                    </table>
                    </div>
                    
                    <div class="col-md-12">
                    {{ $productCompanies->links('pagination::bootstrap-4') }}
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
