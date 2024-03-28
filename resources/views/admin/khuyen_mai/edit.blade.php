@extends('admin.layouts.master')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Khuyến mãi',
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
                <h5>Cập nhật khuyến mãi</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.khuyen_mai.update', $khuyenMai->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group ">
                        <label for="ten_khuyen_mai">Tên khuyến mãi</label>
                        <input type="text" class="form-control" id="ten_khuyen_mai" name="ten_khuyen_mai" value="{{ $khuyenMai->ten_khuyen_mai }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="loai_giam_gia">Loại giảm giá</label>
                        <select class="form-control" id="loai_giam_gia" name="loai_giam_gia" required>
                            <option value="1" {{ $khuyenMai->loai_giam_gia == 1 ? 'selected' : '' }}>Phần trăm</option>
                            <option value="0" {{ $khuyenMai->loai_giam_gia == 0 ? 'selected' : '' }}>Số tiền</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="gia_tri_giam">Giá trị giảm</label>
                        <input type="number" class="form-control" id="gia_tri_giam" name="gia_tri_giam" value="{{ $khuyenMai->gia_tri_giam }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="so_luong">Số lượng</label>
                        <input type="number" class="form-control" id="so_luong" name="so_luong" value="{{ $khuyenMai->so_luong }}" required>
                    </div>


                    <div class="form-group mt-3">
                        <label for="ma_giam_gia">Mã giảm giá</label>
                        <input type="text" class="form-control" id="ma_giam_gia" name="ma_giam_gia" value="{{ $khuyenMai->ma_giam_gia }}" required>
                    </div>


                    <div class="form-group mt-3">
                        <label for="loai_phong_id">Loại phòng áp dụng</label>
                        <select class="form-control" id="loai_phong_id" name="loai_phong_id" value="{{$khuyenMai->loai_phong_id}}" required>
                            @foreach ($loai_phongs as $loai_phong)
                            <option value="{{ $loai_phong->id }}" {{ $khuyenMai->loai_phong_id == $loai_phong->id ? 'selected' : '' }}>{{ $loai_phong->ten }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="mt-3" for="ngay_bat_dau">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" value="{{ $khuyenMai->ngay_bat_dau }}" required>
                        </div>
                        <div class="col-6">
                            <label class="mt-3" for="ngay_ket_thuc">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc" value="{{ $khuyenMai->ngay_ket_thuc }}" required>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mt-3" for="trang_thai">Trạng thái: </label>
                        <input type="radio" name="trang_thai" id="trang_thai1" @if ($khuyenMai->trang_thai == \App\Models\KhuyenMai::DANG_AP_DUNG) checked @endif
                        value="{{\App\Models\KhuyenMai::DANG_AP_DUNG}}">
                        <label for="trang_thai1">Đang áp dụng</label>


                        <input type="radio" name="trang_thai" id="trang_thai2" @if ($khuyenMai->trang_thai == \App\Models\KhuyenMai::KET_THUC) checked @endif
                        value="{{\App\Models\KhuyenMai::KET_THUC}}">
                        <label for="trang_thai2">Kết thúc</label> <br><br>
                    </div>

                    <button class="btn btn-success">GỬI</button>
                    <a href="{{route('admin.khuyen_mai.index')}}" class="btn btn-danger">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</main>



@endsection