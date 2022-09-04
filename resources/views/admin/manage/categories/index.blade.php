
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
                                
                                <a type="button" href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <button  class="btn btn-danger" id="btnPopupDelete" href="#" data-toggle="modal" data-target="#deleteModal_{{$category->id}}" value="{{ $category->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <!-- <a type="button" href="{{ route('categories.delete', ['id' => $category->id]) }}" class="btn btn-danger">Xoa</a> -->
                            </td>
                        </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa danh mục</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    Bạn có chắc muốn xóa danh mục <span class=""> {{$category->name}} </span>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <a id="btnDeleteCategory" type="button" href="{{route('categories.delete', ['id' => $category->id]) }}" class="btn btn-danger">Xóa</a>
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




