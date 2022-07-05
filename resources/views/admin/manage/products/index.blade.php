
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Sản phẩm','key'=> 'Tất cả'])
        <!-- /.content-header -->
       
        <script>
            // $( document ).ready(function() {
            //     $('#btnPopupDelete').click(function(){
            //         var categoryId = $(this).val();
            //         $('#categoryId').html(categoryId);
            //         $("#btnDeleteCategory").attr("href","/admin/categories/delete/"+categoryId);
            //     });
            // });
        </script>

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
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh đại diện</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                   
                        <tr>
                            <td>123</td>
                            <td>San pham01</td>
                            <td><img src="img_girl.jpg" alt="Girl in a jacket" width="500" height="600"></td>
                            <td>2.000.000</td>
                            <td>22</td>
                            <td>
                                <button  class="btn btn-success" id="" href="#" >
                                <i class="fa-solid fa-eye"></i>
                                </button>
                              
                                <a type="button" href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <button  class="btn btn-danger" id="btnPopupDelete" href="#" data-toggle="modal" data-target="#exampleModal" >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                              
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    </div>
                    
                    <div class="col-md-12">

                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       Bạn có chắc muốn xóa danh mục có id <span id="categoryId"> </span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <a id="btnDeleteCategory" type="button" href="" class="btn btn-danger">Xóa</a>
                    </div>
                    </div>
                </div>
            </div>
    <!-- /.content-wrapper -->
@endsection
