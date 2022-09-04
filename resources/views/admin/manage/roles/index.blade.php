
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('css')
 <link rel="stylesheet" href="{{ asset('css/admin-page/product/index/product-index.css') }}">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('js/reuseable/sweetalert.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/reuseable/select2.js') }}"></script>


@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Vai trò','key'=> 'Tất cả'])
        <!-- /.content-header -->
       

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Thêm người dùng</a>
                    </div>
                    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên vai trò</th>
                            <th>Tên chi tiết</th>
                            <th>Hành động</th>
                        </tr>   
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>
                                <a type="button" href="{{route('roles.edit',['id' => $role->id] )}}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <a  class="btn btn-danger action-delete"  data-url="" >
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                              
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                    <div class="col-md-12">
                        {{ $roles->links('pagination::bootstrap-4') }}
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
