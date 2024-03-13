@extends('admin.layouts.master')
@section('content')
<form class="m-3" action="{{route('admin.phong.store')}}" method="post">
    @csrf
    <h2>Thêm mới phòng</h2>

    <label for="ten_phong">Tên phòng</label>
    <input type="text" name="ten_phong" id="ten_phong" class="form-control">

    <label class="mt-3" for="loai_phong_id">Loại phòng</label>
    <select name="loai_phong_id" id="loai_phong_id" class="form-control">
        @foreach ($loai_phong as $id => $ten)
        <option value="{{$id}}">{{$ten}}</option>
        @endforeach
    </select>

    <label class="mt-3" for="mo_ta">Mô tả</label>
    <textarea name="mo_ta" id="mo_ta" cols="30" rows="10" class="form-control"></textarea>

    <label class="mt-3" class="mt-3" for="trang_thai">Trạng thái:</label>

    <input type="radio" name="trang_thai" id="trang_thai1" value="{{\App\Models\Phong::CON_PHONG}}">
    <label for="trang_thai1">CÒN PHÒNG</label>

    <input type="radio" name="trang_thai" id="trang_thai2" value="{{\App\Models\Phong::HET_PHONG}}">
    <label for="trang_thai2">HẾT PHÒNG</label> <br><br>

    <button class="btn btn-success">GỬI</button>

</form>
@endsection