@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chỉnh sửa khuyến mãi</div>

                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.khuyen_mai.update', $khuyenMai->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="ten_khuyen_mai">Tên khuyến mãi</label>
                                <input type="text" class="form-control" id="ten_khuyen_mai" name="ten_khuyen_mai" value="{{ $khuyenMai->ten_khuyen_mai }}" required>
                            </div>

                            <div class="form-group">
                                <label for="loai_giam_gia">Loại giảm giá</label>
                                <select class="form-control" id="loai_giam_gia" name="loai_giam_gia" required>
                                    <option value="1" {{ $khuyenMai->loai_giam_gia == 1 ? 'selected' : '' }}>Phần trăm</option>
                                    <option value="0" {{ $khuyenMai->loai_giam_gia == 0 ? 'selected' : '' }}>Số tiền</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gia_tri_giam">Giá trị giảm</label>
                                <input type="number" class="form-control" id="gia_tri_giam" name="gia_tri_giam" value="{{ $khuyenMai->gia_tri_giam }}" required>
                            </div>

                            <div class="form-group">
                                <label for="so_luong">Số lượng</label>
                                <input type="number" class="form-control" id="so_luong" name="so_luong" value="{{ $khuyenMai->so_luong }}" required>
                            </div>
                      

                            <div class="form-group">
                                <label for="ma_giam_gia">Mã giảm giá</label>
                                <input type="text" class="form-control" id="ma_giam_gia" name="ma_giam_gia" value="{{ $khuyenMai->ma_giam_gia }}" required>
                            </div>
                            

                            <div class="form-group">
                                <label for="phong_id">Phòng áp dụng</label>
                                <select class="form-control" id="phong_id" name="phong_id" required>
                                    @foreach ($phongList as $phong)
                                        <option value="{{ $phong->id }}" {{ $khuyenMai->phong_id == $phong->id ? 'selected' : '' }}>{{ $phong->ten_phong }}</option>
                                    @endforeach
                                </select>
                            </div>
                        


                            <div class="form-group">
                                <label for="ngay_bat_dau">Ngày bắt đầu</label>
                                <input type="datetime" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" value="{{ $khuyenMai->ngay_bat_dau }}" required>
                            </div>

                            <div class="form-group">
                                <label for="ngay_ket_thuc">Ngày kết thúc</label>
                                <input type="datetime" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc" value="{{ $khuyenMai->ngay_ket_thuc }}" required>


                                <label class="mt-3" for="trang_thai">Trạng thái: </label>
                                <input type="radio" name="trang_thai" id="trang_thai1" @if ($khuyenMai->trang_thai == \App\Models\KhuyenMai::DANG_AP_DUNG) checked @endif
                                value="{{\App\Models\KhuyenMai::DANG_AP_DUNG}}">
                                <label for="trang_thai1">Đang áp dụng</label>

                                
                              <input type="radio" name="trang_thai" id="trang_thai2" @if ($khuyenMai->trang_thai == \App\Models\KhuyenMai::KET_THUC) checked @endif
                                value="{{\App\Models\KhuyenMai::KET_THUC}}">
                                <label for="trang_thai2">Kết thúc</label> <br><br>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>



    @endsection