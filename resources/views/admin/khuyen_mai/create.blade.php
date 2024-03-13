@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thêm mới khuyến mãi</div>

                    <div class="panel-body">
                        <form action="{{ route('admin.khuyen_mai.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="ten_khuyen_mai">Tên khuyến mãi</label>
                                <input type="text" class="form-control" id="ten_khuyen_mai" name="ten_khuyen_mai" placeholder="Nhập tên khuyến mãi" required>
                            </div>

                            <div class="form-group">
                                <label for="phong_id">Phòng áp dụng</label>
                                <select class="form-control" id="phong_id" name="phong_id" required>
                                    @foreach ($phongList as $phong)
                                        <option value="{{ $phong->id }}">{{ $phong->ten_phong }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="ma_giam_gia">Mã giảm giá</label>
                                <input type="text" class="form-control" id="ma_giam_gia" name="ma_giam_gia" placeholder="Nhập mã giảm giá" required>
                            </div>
                            

                                <label class="mt-3" for="loai_giam_gia">Loại giảm giá</label>

                                <input type="radio" name="loai_giam_gia" id="loai_giam_gia1" value="{{App\Models\KhuyenMai::GIAM_THEO_PHAN_TRAM}}">
                                <label for="loai_giam_gia1">Theo phần trăm</label>
    
                                <input type="radio" name="loai_giam_gia" id="loai_giam_gia2" value="{{App\Models\KhuyenMai::GIAM_THEO_VND}}">
                                <label for="loai_giam_gia2">Theo tiền VND</label>
                            </div>

                            <div class="form-group">
                                <label for="gia_tri_giam">Giá trị giảm</label>
                                <input type="number" class="form-control" id="gia_tri_giam" name="gia_tri_giam" placeholder="Nhập giá trị giảm" required>
                            </div>

                            <div class="form-group">
                                <label for="mo_ta">Mô tả</label>
                                <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4" placeholder="Nhập mô tả cho khuyến mãi"></textarea>
                            </div>
                            

                            <div class="form-group">
                                <label for="so_luong">Số lượng</label>
                                <input type="number" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lượng" required>
                            </div>

                            <div class="form-group">
                                <label for="ngay_bat_dau">Ngày bắt đầu</label>
                                <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" required>
                            </div>

                            <div class="form-group">
                                <label for="ngay_ket_thuc">Ngày kết thúc</label>
                                <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc" required>
                            </div>

                            <label class="mt-3" for="trang_thai">Trạng thái:</label>

                            <input type="radio" name="trang_thai" id="trang_thai1" value="{{App\Models\KhuyenMai::DANG_AP_DUNG}}">
                            <label for="trang_thai1">Đang áp dụng</label>

                            <input type="radio" name="trang_thai" id="trang_thai2" value="{{App\Models\KhuyenMai::KET_THUC}}">
<<<<<<< HEAD
                            <label for="trang_thai2">Kết thúc</label>
=======
                            <label for="trang_thai2">Kết thúc</label> <br>
>>>>>>> a96b1387413af07636ee3ceba636c7a99f6f7891

                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
