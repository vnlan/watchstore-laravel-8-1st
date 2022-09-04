
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Thêm danh mục</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
@include('admin.partials.content-header', ['name' => 'danh mục sản phẩm','key'=> 'Thêm mới'])
        <!-- /.content-header -->
@section('js')
    <script type="text/javascript" src="{{ asset('js/reuseable/select2.js') }}"></script>
@endsection
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <form action="{{ route('categories.store') }}" method="post">
                         @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                            
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">----Chọn danh mục cha----</option>
                                {!! $categoryOptions !!}
                            </select>                  
                            
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




