
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


<script src="https://cdn.tiny.cloud/1/pp9wiwakvd50ep1lopz267i1d84gvpyr5hnnhk6vpcwpxd4f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/admin-page/product/add.js') }}">

  </script>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">

                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="sku" placeholder="Mã sản phẩm">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputPassword4">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Danh mục sản phẩm</label>
                                <select name="category_id"  class="form-control">
                                    <!-- <option value="0" selected>----Chọn danh mục sản phẩm----</option> -->
                                    {!! $categoryOptions !!}
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Hãng sản xuất</label>
                                <select name="product_company_id" class="form-control">
                                    
                                    @foreach($productCompanies as $productCompany)
                                        <option value="{{ $productCompany->id }}"> {{ $productCompany->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Giá sản phẩm</label>
                                <input type="number" min="0" class="form-control" name="price" placeholder="Nhập giá sản phẩm (VNĐ)">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Số lượng</label>
                                <input type="number" min="0" class="form-control" name="stock" placeholder="Nhập số lượng sản phẩm">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Ảnh đại diện sản phẩm</label>
                                <input type="file" name="feature_image_path"  class="form-control-file" id="inputAddress" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Các ảnh chi tiết</label>
                                <input type="file" name="image_path[]" multiple  class="form-control-file" id="inputAddress" placeholder="Nhập số lượng sản phẩm">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputAddress">Mô tả ngắn</label>
                            <textarea class="form-control" name="short_description" placeholder="Nhập mô tả ngắn"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Mô tả chi tiết</label>
                            <textarea class="form-control tinymce-editor" name="long_description" rows="6"></textarea>
                        </div>
                        <!-- <div class="form-row">
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
                        </div> -->
                        <div class="form-group">
                            <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                            </div> -->
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




