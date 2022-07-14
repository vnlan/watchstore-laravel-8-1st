
@extends('admin.layouts.admin-layout')

@section('title')
    <title>Sửa chi tiết sản phẩm</title>

@endsection

@section('css')
 <link rel="stylesheet" href="{{ asset('css/admin-page/product/index/product-index.css') }}">
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
@include('admin.partials.content-header', ['name' => 'Sản phẩm','key'=> 'Sửa chi tiết'])
        <!-- /.content-header -->


<script src="https://cdn.tiny.cloud/1/pp9wiwakvd50ep1lopz267i1d84gvpyr5hnnhk6vpcwpxd4f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/admin-page/product/add.js') }}">

  </script>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <p></p>
                <div class="row">
                    <div class="col-9">

                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="sku" placeholder="Mã sản phẩm" value="{{ $product->sku }}">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputPassword4">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="{{ $product->name }}">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Danh mục sản phẩm</label>
                                <select name="category_id"  class="form-control">
                                    <option value="0" selected>----Chọn danh mục sản phẩm----</option>
                                    {!! $categoryOptions !!}
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Hãng sản xuất</label>
                                <select name="product_company_id" class="form-control">
                                    <option value="1" selected>----Chọn hãng sản xuất----</option>
                                    <option>...</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Giá sản phẩm</label>
                                <input type="number" min="0" class="form-control" name="price" placeholder="Nhập giá sản phẩm (VNĐ)" value="{{  $product->price }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Số lượng</label>
                                <input type="number" min="0" class="form-control" name="stock" placeholder="Nhập số lượng sản phẩm" value="{{ $product->stock }}">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Ảnh đại diện sản phẩm</label>
                                <input type="file" name="feature_image_path"  class="form-control-file" id="inputAddress" >
                                <div class="col-md-12 mt-3">
                                    <div class="row">
                                        <img src="{{ $product->feature_image_path }}" alt="Empty!" width="100%" height="auto" class="img-custom">
                                    </div>
                                </div>
                            
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Các ảnh chi tiết</label>
                                <input type="file" name="image_path[]" multiple  class="form-control-file" id="inputAddress" placeholder="Nhập số lượng sản phẩm">

                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($product->images as $image)
                                        <div class="col-md-3 my-2">
                                            <img src="{{ $image->image_path }}" alt="Empty!" width="100%" height="auto" class="img-custom">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputAddress">Mô tả ngắn</label>
                            <textarea class="form-control" name="short_description" placeholder="Nhập mô tả ngắn">{{ $product->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Mô tả chi tiết</label>
                            <textarea class="form-control tinymce-editor" name="long_description" rows="9">{{ $product->long_description }}</textarea>
                        </div>
                       
                        <div class="form-group">
                         
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





