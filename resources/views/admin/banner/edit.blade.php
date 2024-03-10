@extends('admin.layouts.master')
@section('content')
    <form class="m-3" action="{{route('admin.banners.update',$findData->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="anh">Ảnh </label>
        <input type="file" name="anh" id="anh" class="form-control">
        <label for="anh">Ảnh cũ</label>
        <img src="{{ asset('storage/banners/' .$findData->anh) }}" alt="Ảnh" width="150px">
        <label class="mt-3" for="mota">Mô tả</label>
        <input type="text" name="mo_ta" id="mota" value="{{$findData->mo_ta}}" class="form-control">    
        <label class="mt-3" for="trang_thai">Trạng thái:</label>
       <select name="trang_thai" id="" class="form-select">
        <option value="1" {{ $findData->trang_thai == '1' ? 'selected' : '' }}>Hoạt động
        </option>
        <option value="0" {{ $findData->trang_thai == '0' ? 'selected' : '' }}>Không hoạt
            động</option>
       </select>

        <button class="btn btn-success mt-3">GỬI</button>
    </form>
@endsection