@extends('admin.layouts.master')
@section('content')
    <form class="m-3" action="{{route('admin.banners.update',$findData->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="anh" class="form-label">Chọn ảnh mới</label>
            <input type="file" name="anh" id="anh" class="form-control">
        </div>
        <div class="mb-3">
            <label for="anhCu" class="form-label">Ảnh hiện tại</label>
            <img src="{{ asset('storage/banners/' .$findData->anh) }}" alt="Ảnh" width="150px">
        </div>
        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả</label>
            <input type="text" name="mo_ta" id="mota" value="{{$findData->mo_ta}}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="trang_thai" class="form-label">Trạng thái</label>
            <select name="trang_thai" id="trang_thai" class="form-select">
                <option value="1" {{ $findData->trang_thai == '1' ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $findData->trang_thai == '0' ? 'selected' : '' }}>Không hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">GỬI</button>
    </form>
@endsection