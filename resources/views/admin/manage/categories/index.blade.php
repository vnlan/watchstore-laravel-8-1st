
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Danh mục sản phẩm','key'=> 'Tất cả'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Thêm danh mục</a>
                    </div>
                    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ten danh muc</th>
                            <th>Hanh dong</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a type="button" href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-primary">Edit</a>
                                <a type="button" href="{{ route('categories.delete', ['id' => $category->id]) }}" class="btn btn-danger">Xoa</a>
                            </td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                    <div class="col-md-12">
                    {{ $categories->links('pagination::bootstrap-4') }}
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




