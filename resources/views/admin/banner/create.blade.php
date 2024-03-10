@extends('admin.layouts.master')
@section('content')
    <form class="m-3" action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <label for="anh">Ảnh</label>
        <input type="file" name="anh" id="anh" value="{{ old('anh') }}" class="form-control">
        <label class="mt-3" for="mota">Mô tả</label>
        <input type="text" name="mo_ta" id="mota" value="{{ old('mo_ta') }}" class="form-control">
        <label class="mt-3" for="trang_thai">Trạng thái:</label>
        <select name="trang_thai" id="" class="form-select">
            <option value="1">Hoạt động</option>
            <option value="0">Không hoạt động</option>
        </select>

        <button class="btn btn-success mt-3">GỬI</button>
    </form>
@endsection
