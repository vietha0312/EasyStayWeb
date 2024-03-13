@extends('admin.layouts.master')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($dichVu))
    <form action="{{route('admin.dich_vu.update', $dichVu->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="ten">Tên Dịch Vụ</label>
            <input type="text" class="form-control" id="ten" name="ten_dich_vu" value="{{ old('ten', $dichVu->ten_dich_vu) }}" placeholder="Nhập tên dịch vụ">
        </div>
        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="number" class="form-control" id="gia" name="gia" value="{{ old('gia', $dichVu->gia) }}" placeholder="Nhập giá dịch vụ">
        </div>
        <div class="form-group">
            <label for="so_luong">Số Lượng</label>
            <input type="number" class="form-control" id="so_luong" name="so_luong" value="{{ old('so_luong', $dichVu->so_luong) }}" placeholder="Nhập số lượng dịch vụ">
        </div>
        <div class="form-group">
            <label for="trang_thai">Trạng Thái</label>
            <select class="form-control" id="trang_thai" name="trang_thai">
                <option value="1" @if ($dichVu->trang_thai == 1) selected @endif>Hoạt động</option>
                <option value="0" @if ($dichVu->trang_thai == 0) selected @endif>Ngừng hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endif

@endsection
