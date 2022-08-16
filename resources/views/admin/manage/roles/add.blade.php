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
   
    <script type="text/javascript" src="{{ asset('js/admin-page/role/add.js') }}"></script>

    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                                    <input type="text" class="form-control" name="display_name" placeholder="Nhập tên danh mục">

                                </div>
                                <div class="form-group">
                                    <label>Mô tả vai trò</label>
                                    <textarea class="form-control" rows="4" placeholder="Nhập mô tả vai trò"></textarea>
                                </div>
                            </div>
                        </div>
                        @foreach ( $permissionParents as $permissionParent)
                        <div class="row">
        
                            <div class="col-md-12">
                                <div class="card  border-primary mb-3 col-md-12">
                                    <div class="bg-green card-header">
                                        <label>
                                            <input type="checkbox" value="" class="checkbox_wrapper" />
                                          Module {{ $permissionParent->name}}
                                        </label>
                                    </div>
                                    <div class="row">
                                    @foreach ($permissionParent->permissionChildren as $permissionChildren)
                             
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            <label>
                                                <input type="checkbox" name="permission_id[]" class="checkbox_children" value="{{ $permissionChildren->id }}" />
                                            </label>
                                            {{ $permissionChildren->display_name}}
                                        </h5>
                                    </div>
                                    @endforeach
                                    </div>

                                </div>
                            @endforeach


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