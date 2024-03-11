@extends('admin.layouts.master')
@section('content')
<form class="m-3" action="{{route('admin.vai_tro.update',$vai_tro)}}" method="post">
    @csrf
    @method('put')
    <h2>Thêm mới phòng</h2>

    <label for="ten_chuc_vu">Tên chức vụ</label>
    <input type="text" name="ten_chuc_vu" id="ten_chuc_vu" class="form-control" value="{{$vai_tro->ten_chuc_vu}}">

    <label class="mt-3" for="mo_ta">Mô tả</label>
    <textarea name="mo_ta" id="mo_ta" cols="30" rows="10" class="form-control">{{$vai_tro->mo_ta}}</textarea>

    <label class="mt-3" class="mt-3" for="trang_thai">Trạng thái:</label>

    <input type="radio" name="trang_thai" id="trang_thai1" @if ($vai_tro->trang_thai == \App\Models\VaiTro::HOAT_DONG) checked @endif
     value="{{\App\Models\VaiTro::HOAT_DONG}}">
    <label for="trang_thai1">Hoạt Động</label>

    <input type="radio" name="trang_thai" id="trang_thai2" @if ($vai_tro->trang_thai == \App\Models\VaiTro::DUNG_HOAT_DONG) checked @endif
     value="{{\App\Models\VaiTro::DUNG_HOAT_DONG}}">
    <label for="trang_thai2">Dừng Hoạt Động</label> <br><br>

    <button class="btn btn-success">GỬI</button>

</form>
@endsection
