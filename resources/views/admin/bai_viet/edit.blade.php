@extends('admin.layouts.master')
@section('content')

<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Bài viết',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="mx-3">
        @if (\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h5>Cập nhật bài viết</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.bai_viet.update', $bai_viet) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <label for="tieu_de">Tiêu đề</label>
                            <input type="text" name="tieu_de" id="tieu_de" class="form-control" value="{{ $bai_viet->tieu_de }}">

                            <label class="mt-3" for="anh">Ảnh</label>
                            <input type="file" name="anh" id="anh" class="form-control" value="{{ $bai_viet->anh }}"> <br>
                            <img width="150px" src="{{ Storage::url($bai_viet->anh) }}" alt="ảnh miêu tả bài viết"> <br>

                            <label class="mb-3" for="mo_ta_ngan" class="form-label">Mô tả ngắn:</label>
                            <textarea name="mo_ta_ngan" id="mo_ta_ngan" cols="20" rows="5" class="form-control">{{ $bai_viet->mo_ta_ngan }}</textarea>

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

                            <button type="submit" class="btn btn-success">Gửi</button>
                            <a class="btn btn-danger" href="{{route('admin.bai_viet.index')}}">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection