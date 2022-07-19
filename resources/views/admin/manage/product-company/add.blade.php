@extends('admin.layouts.admin-layout')

@section('title')
    <title>Thêm Hãng sản xuất</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
@include('admin.partials.content-header', ['name' => 'Hãng sản xuất','key'=> 'Thêm mới'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <form action="{{ route('product-company.store') }}" method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <input type="text" class="form-control" name="company_name" placeholder="Nhập tên thương hiệu">
                            
                        </div>
                        <div class="form-group">
                            <label>Tên viết tắt</label>
                            <input type="text" class="form-control" name="company_short_name" placeholder="Nhập tên viết tắt">
                            
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" class="form-control-file" name="logo_image_path" >
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" name="address" placeholder="Nhập địa chỉ"></textarea>          
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
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