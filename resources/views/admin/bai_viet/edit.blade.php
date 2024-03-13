@extends('admin.layouts.master')
@section('content')
    <form class="m-3" action="{{ route('admin.bai_viet.update', $bai_viet) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h2>Thêm mới bài viết</h2>
        <label for="tieu_de">Tiêu đề</label>
        <input type="text" name="tieu_de" id="tieu_de" class="form-control" value="{{ $bai_viet->tieu_de }}">

        <label class="mt-3" for="anh">Ảnh</label>
        <input type="file" name="anh" id="anh" class="form-control" value="{{ $bai_viet->anh }}"> <br>
        <img width="150px" src="{{ Storage::url($bai_viet->anh) }}" alt="ảnh miêu tả bài viết"> <br>

        <label class="mt-3" for="noi_dung">Nội dung</label>
        <textarea id="noi_dung2" name="noi_dung" class="form-control">{{ $bai_viet->noi_dung }}</textarea>

        <!-- <textarea id="my-editor" name="noi_dung" class="form-control">{{ $bai_viet->noi_dung }}</textarea> -->
        <!-- <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe> -->



        <label class="mt-3" for="trang_thai">Trạng thái:</label>

        <input type="radio" name="trang_thai" id="trang_thai1" @if ($bai_viet->trang_thai == \App\Models\Bai_viet::XUAT_BAN) checked @endif
            value="{{ \App\Models\Bai_viet::XUAT_BAN }}">
        <label for="trang_thai1">XUẤT BẢN</label>

        <input type="radio" name="trang_thai" id="trang_thai2" @if ($bai_viet->trang_thai == \App\Models\Bai_viet::NHAP) checked @endif
            value="{{ \App\Models\Bai_viet::NHAP }}">
        <label for="trang_thai2">NHÁP</label> <br><br>

        <button type="submit" class="btn btn-success">Submit</button>

    </form>
@endsection
