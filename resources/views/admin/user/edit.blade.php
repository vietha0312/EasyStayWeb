@extends('admin.layouts.master')
@section('content')

<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Người dùng',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="mx-3">
        @if (\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Cập nhật người dùng </h5>
            </div>

            <div class="card-body">
                <form action="{{route('admin.user.update',$user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label for="ten_nguoi_dung">Họ và tên</label>
                    <input type="text" id="ten_nguoi_dung" name="ten_nguoi_dung" class="form-control" value="{{$user->ten_nguoi_dung}}">

                    <label class="mt-3"  for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">

                    <label class="mt-3"  for="dia_chi">Địa chỉ</label>
                    <input type="text" id="dia_chi" name="dia_chi" class="form-control" value="{{$user->dia_chi}}">

                    <label class="mt-3"  for="gioi_tinh">Giới tính</label>
                    <select name="gioi_tinh" id="gioi_tinh" value="{{$user->ngay_sinh}}" class="form-control">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    <label class="mt-3"  for="ngay_sinh">Ngày sinh</label>
                    <input type="date" id="ngay_sinh" name="ngay_sinh" class="form-control" value="{{$user->ngay_sinh}}">

                    <label class="mt-3"  for="so_dien_thoai">Số điện thoại</label>
                    <input type="text" id="so_dien_thoai" name="so_dien_thoai" class="form-control" value="{{$user->so_dien_thoai}}">

                    <label class="mt-3"  for="anh">Ảnh</label>
                    <input type="file" id="anh" name="anh" class="form-control" value="{{$user->anh}}">

                    <label class="mt-3"  for="id_vai_tro">Tên chức vụ</label>
                    <select name="id_vai_tro" id="id_vai_tro" class="form-control" value="{{$user->id_vai_tro}}">
                        @foreach ($vaitro as $id => $ten_chuc_vu)
                        <option value="{{$id}}">{{$ten_chuc_vu}}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-success mt-3" >GỬI</button>
                    <a href="{{route('admin.user.index')}}" class="btn btn-danger mt-3">Quay lại</a>

                </form>
            </div>
        </div>
    </div>
</main>



@endsection
