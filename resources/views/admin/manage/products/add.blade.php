
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Thêm sản phẩm</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
@include('admin.partials.content-header', ['name' => 'Sản phẩm','key'=> 'Thêm mới'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Mã sản phẩm">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Tên sản phẩm</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Tên sản phẩm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Danh mục sản phẩm</label>
                            <select id="" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Hãng sản xuất</label>
                            <select id="" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Giá sản phẩm</label>
                            <input type="number" min="0" class="form-control" id="inputAddress" placeholder="Nhập giá sản phẩm (VNĐ)">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Số lượng</label>
                            <input type="number" min="0" class="form-control" id="inputAddress" placeholder="Nhập số lượng sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Ảnh đại diện sản phẩm</label>
                            <input type="file"  class="form-control" id="inputAddress" >
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Các ảnh chi tiết</label>
                            <input type="file" multiple  class="form-control" id="inputAddress" placeholder="Nhập số lượng sản phẩm">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
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




