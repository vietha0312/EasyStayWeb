@extends('admin.layouts.master')
@section('content')
<form class="m-3" action="{{route('admin.user.update',$user)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <h2>Cập nhật người dùng</h2>
    <label for="">Họ và tên</label>
    <input type="text" id="ten_nguoi_dung" name="ten_nguoi_dung" class="form-control" value="{{$user->ten_nguoi_dung}}">

    <label for="">Email</label>
    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">

    <label for="">Địa chỉ</label>
    <input type="dia_chi" id="dia_chi" name="dia_chi" class="form-control" value="{{$user->dia_chi}}">

    <label for="">Số điện thoại</label>
    <input type="so_dien_thoai" id="so_dien_thoai" name="so_dien_thoai" class="form-control" value="{{$user->so_dien_thoai}}">

    <button class="btn btn-success mt-3">Sửa</button>
</form>
@endsection
