@extends('admin.layouts.master')
@section('content')
    <form class="m-3" action="{{ route('admin.bai_viet.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Thêm mới bài viết</h2>
        <label for="tieu_de">Tiêu đề</label>
        <input type="text" name="tieu_de" id="tieu_de" class="form-control">

        <label class="mt-3" for="anh">Ảnh</label>
        <input type="file" name="anh" id="anh" class="form-control">


        <label class="mt-3" for="noi_dung">Nội dung</label>
        <textarea name="noi_dung" id="noi_dung" cols="30" rows="10" class="form-control"></textarea>

        <label class="mt-3" for="trang_thai">Trạng thái:</label>

        <input type="radio" name="trang_thai" id="trang_thai1" value="{{ \App\Models\Bai_viet::XUAT_BAN }}">
        <label for="trang_thai1">XUẤT BẢN</label>

        <input type="radio" name="trang_thai" id="trang_thai2" value="{{ \App\Models\Bai_viet::NHAP }}">
        <label for="trang_thai2">NHÁP</label> <br><br>

        <button type="submit" class="btn btn-success mt-3">GỬI</button>

    </form>
@endsection
