@extends('admin.layouts.admin-layout')

@section('title')
<title>Thêm vai trò</title>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', ['name' => 'Vai trò','key'=> 'Thêm mới'])
    <!-- /.content-header -->
    @section('js')
    <script type="text/javascript" src="{{ asset('js/reuseable/select2.js') }}"></script>
    @endsection

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên vai trò</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">

                                </div>
                                <div class="form-group">
                                    <label>Tên chi tiết vai trò</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">

                                </div>
                                <div class="form-group">
                                    <label>Mô tả vai trò</label>
                                    <textarea class="form-control" rows="4" placeholder="Nhập mô tả vai trò"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card  border-primary mb-3 col-md-12">
                                    <div class="bg-green card-header">
                                        <label>
                                            <input type="checkbox" value="" />
                                            Module sản phẩm
                                        </label>
                                    </div>
                                    <div class="row">
                                    @for ($i=1; $i<=4; $i++)
                                        
                                  
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            <label>
                                                <input type="checkbox" value="" />
                                            </label>
                                            Thêm sản phẩm
                                        </h5>
                                    </div>
                                    @endfor
                                    </div>

                                </div>

                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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