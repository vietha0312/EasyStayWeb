@extends('admin.layouts.master')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Loại phòng',
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
        <div class="card">
            <div class="card-header">
                <h5>Cập nhật loại phòng</h5>
            </div>

            <div class="card-body">
                <form action="{{route('admin.loai_phong.update',$loai_phong)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label for="ten">Tên</label>
                    <input type="text" name="ten" id="ten" class="form-control" value="{{$loai_phong->ten}}">

                    <label class="mt-3" for="anh">Ảnh</label>
                    <input type="file" name="anh" id="anh" class="form-control" value="{{$loai_phong->anh}}">
                    @if ($loai_phong->anh)
                    <img class="mt-3" width="150px" src="{{ Storage::url($loai_phong->anh) }}" alt="Ảnh phòng">
                    @endif <br>

                    <label class="mt-3" for="anh">Giá</label>
                    <input type="text" name="gia" id="gia" class="form-control" value="{{$loai_phong->gia}}">

                    <label class="mt-3" for="gia_ban_dau">Giá ban đầu</label>
                    <input type="text" name="gia_ban_dau" id="gia_ban_dau" class="form-control" value="{{$loai_phong->gia_ban_dau}}">

                    <label class="mt-3" for="gioi_han_nguoi">Giới hạn người</label>
                    <input type="text" name="gioi_han_nguoi" id="gioi_han_nguoi" class="form-control" value="{{$loai_phong->gioi_han_nguoi}}">

                    <label class="mt-3" for="so_luong">Số lượng</label>
                    <input type="text" name="so_luong" id="so_luong" class="form-control" value="{{$loai_phong->so_luong}}">

                    <label class="mt-3" for="mo_ta_ngan">Mô tả ngắn</label>
                    <input type="text" name="mo_ta_ngan" id="mo_ta_ngan" class="form-control" value="{{$loai_phong->mo_ta_ngan}}">

                    <label class="mt-3" for="mo_ta_dai">Mô tả dài</label>
                    <input type="text" name="mo_ta_dai" id="mo_ta_dai" class="form-control" value="{{$loai_phong->mo_ta_dai}}">

                    <label class="mt-3" for="trang_thai">Trạng thái: </label>
                    <input type="radio" name="trang_thai" id="trang_thai1" @if ($loai_phong->trang_thai == \App\Models\Loai_phong::CON_PHONG) checked @endif
                    value="{{\App\Models\Loai_phong::CON_PHONG}}">
                    <label for="trang_thai1">CÒN PHÒNG</label>

                    <input type="radio" name="trang_thai" id="trang_thai2" @if ($loai_phong->trang_thai == \App\Models\Loai_phong::HET_PHONG) checked @endif
                    value="{{\App\Models\Loai_phong::HET_PHONG}}">
                    <label for="trang_thai2">HẾT PHÒNG</label> <br><br>

                    <button class="btn btn-success">GỬI</button>
                    <a href="{{route('admin.loai_phong.index')}}" class="btn btn-danger">Quay lại</a>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection