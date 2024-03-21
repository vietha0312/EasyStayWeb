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
                    <h5>Tạo mới khuyến mãi</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.khuyen_mai.store') }}" method="post">
                        {{ csrf_field() }}

                        <!-- <div class="form-group"> -->
                        <label class="mt-3" for="ten_khuyen_mai">Tên khuyến mãi</label>
                        <input type="text" class="form-control" id="ten_khuyen_mai" name="ten_khuyen_mai"
                            placeholder="Nhập tên khuyến mãi" required>
                        <!-- </div> -->

                        <!-- <div class="form-group"> -->
                        <label class="mt-3" for="loai_phong_id">Loại phòng áp dụng</label>
                        <select class="form-control" id="loai_phong_id" name="loai_phong_id" required>
                            @foreach ($loai_phongs as $loai_phong)
                                <option value="{{ $loai_phong->id }}">{{ $loai_phong->ten }}</option>
                            @endforeach
                        </select>
                        <!-- </div> -->

                        <!-- <div class="form-group"> -->
                        <label class="mt-3" for="ma_giam_gia">Mã giảm giá</label>
                        <input type="text" class="form-control" id="ma_giam_gia" name="ma_giam_gia"
                            placeholder="Nhập mã giảm giá" required>
                        <!-- </div> -->


                        <label class="mt-3" for="loai_giam_gia">Loại giảm giá</label>

                        <input type="radio" name="loai_giam_gia" id="loai_giam_gia1"
                            value="{{ App\Models\KhuyenMai::GIAM_THEO_PHAN_TRAM }}">
                        <label for="loai_giam_gia1">Theo phần trăm</label>

                        <input type="radio" name="loai_giam_gia" id="loai_giam_gia2"
                            value="{{ App\Models\KhuyenMai::GIAM_THEO_VND }}">
                        <label for="loai_giam_gia2">Theo tiền VND</label> <br>
                        <!-- </div> -->

                        <!-- <div class="form-group"> -->
                        <label class="mt-3" for="gia_tri_giam">Giá trị giảm</label>
                        <input type="number" class="form-control" id="gia_tri_giam" name="gia_tri_giam"
                            placeholder="Nhập giá trị giảm" required>
                        <!-- </div> -->

                        <!-- <div class="form-group"> -->
                        <!-- <label class="mt-3" for="mo_ta">Mô tả</label> -->
                        <!-- <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4" placeholder="Nhập mô tả cho khuyến mãi"></textarea> -->
                        <!-- </div> -->


                        <!-- <div class="form-group"> -->
                        <label class="mt-3" for="so_luong">Số lượng</label>
                        <input type="number" class="form-control" id="so_luong" name="so_luong"
                            placeholder="Nhập số lượng" required>
                        <!-- </div> -->

                        <div class="row">
                            <div class="col-6">
                                <label class="mt-3" for="ngay_bat_dau">Ngày bắt đầu</label>
                                <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" required>
                            </div>
                            <div class="col-6">
                                <label class="mt-3" for="ngay_ket_thuc">Ngày kết thúc</label>
                                <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc" required>
                            </div>
                        </div>

                        <label class="mt-3" for="trang_thai">Trạng thái:</label>

                        <input type="radio" name="trang_thai" id="trang_thai1"
                            value="{{ App\Models\KhuyenMai::DANG_AP_DUNG }}">
                        <label for="trang_thai1">Đang áp dụng</label>

                        <input type="radio" name="trang_thai" id="trang_thai2"
                            value="{{ App\Models\KhuyenMai::KET_THUC }}">
                        <label for="trang_thai2">Kết thúc</label> <br>


                        <button type="submit" class="btn btn-success my-3">Gửi</button>
                        <a href="{{ route('admin.khuyen_mai.index') }}" class="btn btn-danger ms-3">Quay lại</a>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
