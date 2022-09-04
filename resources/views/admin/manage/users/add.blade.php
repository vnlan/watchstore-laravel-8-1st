@extends('admin.layouts.admin-layout')

@section('title')
<title>Thêm danh mục</title>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('admin.partials.content-header', ['name' => 'Người dùng','key'=> 'Thêm mới'])

  @section('css')
  <link rel="stylesheet" href="{{ asset('css/admin-page/reuseable/img-fit.css') }}">
  </link>
  @endsection
  <!-- /.content-header -->
  @section('js')
    <script type="text/javascript" src="{{ asset('js/admin-page/user/add.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/reuseable/select2.js') }}"></script>
  @endsection
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class="col-sm-3">


                </div> -->
        <!--/col-3-->
        <div class="col-sm-10" >
          <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-sm-3">
                <div class="text-center">
                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="250px" height="250px" class="avatar1 img-circle img-thumbnail img-custom" alt="avatar">
                  <!-- <h6>Upload a different photo...</h6> -->
                  <input type="file" name="avatar_path" class="text-center center-block" onchange="showSinglePicture(this,1);" />
                </div>
              </div>
              <div class="col-sm-9">
                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="inputEmail4">Họ và tên</label>
                    <input type="text" class="form-control" name="display_name" placeholder="Họ và tên">
                  </div>
                 
                  <div class="form-group col-md-4">
                    <label for="exampleFormControlSelect1">Giới tính</label>
                    <select class="form-control" name="gender">
                      <option value="0">Nam</option>
                      <option value="1">Nữ</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputAddress">Số CMT</label>
                    <input type="text" class="form-control"  name="id_card_number" placeholder="Nhập số CMT">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Ngày sinh</label>
                    <input type="date" class="form-control" name="dob" placeholder="Apartment, studio, or floor">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputAddress">Tài Khoản</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập tài khoản">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputAddress2">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputAddress2">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="exampleFormControlSelect1">Vai trò</label>
                    <select class="form-control select2-multiple" name="role_id[]" multiple="multiple">
                      @foreach ( $roles as $role )
                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                      @endforeach
                      
                     
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Mức lương</label>
                    <input type="number" min="0" class="form-control" name="salary" placeholder="Mức lương">
                  </div>
                </div>

              </div>

            </div>

            <div class="form-row ">
              <div class="form-group col-md-4">
                <label>Địa chỉ</label>
                <textarea class="form-control" name="address"  rows="3" placeholder="Nhập địa chỉ"></textarea>

              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Học vấn</label>
                <textarea class="form-control" name="education"  rows="3" placeholder="Nhập học vấn"></textarea>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Kỹ năng</label>
                <textarea class="form-control" name="skill"  rows="3" placeholder="Nhập kỹ năng"></textarea>
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-4">
                <label>Mô tả</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Nhập mô tả"></textarea>

              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Ảnh hợp đồng</label>
                <p></p>
                <div class="text-center">

                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="350" height="auto" class="avatar2  img-custom" alt="avatar">
                  <!-- <h6>Upload a different photo...</h6> -->
                  <input type="file" name="contract_image_path" class="text-center center-block" onchange="showSinglePicture(this,2);" />
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Ghi chú</label>
                <textarea class="form-control" name="" id="" rows="3" placeholder="Nhập ghi chú"></textarea>
              </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mx-3">Thêm mới</button>
                <button type="reset" class="btn btn-danger">Hủy</button>
              </div>
          </form>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection