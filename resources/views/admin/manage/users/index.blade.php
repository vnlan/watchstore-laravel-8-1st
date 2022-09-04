
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
        @include('admin.partials.content-header', ['name' => 'Người dùng','key'=> 'Tất cả'])
        <!-- /.content-header -->
       

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Thêm người dùng</a>
                    </div>
                    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Số CMT</th>
                            <th>Họ và tên</th>
                            <th>Ảnh đại diện</th>
                            <th>Giới tính</th>
                            <th>Vai trò</th>
                            <th>Mức lương</th>
                            <th>Hành động</th>
                        </tr>   
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id_card_number }}</td>
                            <td>{{ $user->display_name }}</td>
                            <td><img src="{{ $user->avatar_path }}" alt="Empty!" width="150" height="100" class="img-custom"></td>
                            @if ($user->gender == 0)
                                <td>Nam</td>
                            @else
                                <td>Nữ</td>
                            @endif
                            <td>
                                @foreach ($user->roles as $role)
                                    <p>{{$role->name}} </p>
                                @endforeach
                            </td>
                            <td>{{ $user->salary }}</td>
                            <td>
                                <button  class="btn btn-success" id="" href="#" >
                                <i class="fa-solid fa-eye"></i>
                                </button>
                              
                                <a type="button" href="" class="btn btn-primary">
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
                        {{ $users->links('pagination::bootstrap-4') }}
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
