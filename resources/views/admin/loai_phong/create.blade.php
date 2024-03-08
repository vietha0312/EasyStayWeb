@extends('admin.layouts.master')
@section('content')
    <form class="m-3" action="{{route('admin.loai_phong.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="ten">Tên</label>
        <input type="text" name="ten" id="ten" class="form-control">

        <label class="mt-3" for="anh">Ảnh</label>
        <input type="file" name="anh" id="anh" class="form-control">    

        <label class="mt-3" for="anh">Giá</label>
        <input type="text" name="gia" id="gia" class="form-control">

        <label class="mt-3" for="gia_ban_dau">Giá ban đầu</label>
        <input type="text" name="gia_ban_dau" id="gia_ban_dau" class="form-control">

        <label class="mt-3" for="gioi_han_nguoi">Giới hạn người</label>
        <input type="text" name="gioi_han_nguoi" id="gioi_han_nguoi" class="form-control">

        <label class="mt-3" for="so_luong">Số lượng</label>
        <input type="text" name="so_luong" id="so_luong" class="form-control">

        <label class="mt-3" for="mo_ta_ngan">Mô tả ngắn</label>
        <input type="text" name="mo_ta_ngan" id="mo_ta_ngan" class="form-control">

        <label class="mt-3" for="mo_ta_dai">Mô tả dài</label>
        <input type="text" name="mo_ta_dai" id="mo_ta_dai" class="form-control">

        <label class="mt-3" for="trang_thai">Trạng thái:</label>

        <input type="radio" name="trang_thai" id="trang_thai1" value="{{App\Models\Loai_phong::CON_PHONG}}">
        <label for="trang_thai1">CÒN PHÒNG</label>

        <input type="radio" name="trang_thai" id="trang_thai2" value="{{App\Models\Loai_phong::HET_PHONG}}">
        <label for="trang_thai2">HẾT PHÒNG</label> <br>

        <button class="btn btn-success mt-3">GỬI</button>
    </form>
@endsection