@extends('admin.layouts.master')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Đặt phòng',
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
                        <h5>Đặt phòng mới</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.dich_vu.store') }}" method="post" id="addServiceForm">
                            @csrf

                            <div class="form-group mx-auto ">
                                <label for="ten_khach_hang">Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ten" name="ten_khach_hang">
                                <span class="text-danger error-ten_khach_hang"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="loai_phong">Loại Phòng</label>
                                <input type="number" class="form-control" id="loai_phong" name="loai_phong" <span class="text-danger error-loai_phong"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="ten_phong">Tên Phòng</label>
                                <input type="number" class="form-control" id="ten_phong" name="ten_phong">
                                <span class="text-danger error-trn_phong"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="so_luong_phong">Số Lượng phòng</label>
                                <input type="number" class="form-control" id="so_luong_phong" name="so_luong_phong">
                                <span class="text-danger error-so_luong_phong"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="so_luong_nguoi">Số Lượng người</label>
                                <input type="number" class="form-control" id="so_luong_nguoi" name="so_luong_nguoi">
                                <span class="text-danger error-so_luong_nguoi"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="don_gia">Đơn giá</label>
                                <input type="number" class="form-control" id="don_gia" name="don_gia">
                                <span class="text-danger error-don_gia"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="thanh_tien">Thành tiền</label>
                                <input type="number" class="form-control" id="thanh_tien" name="thanh_tien">
                                <span class="text-danger error-thanh_tien"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="payment">Payment</label>
                                <input type="number" class="form-control" id="payment" name="payment">
                                <span class="text-danger error-payment"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="ghi_chu">Ghi chú</label>
                                <input type="number" class="form-control" id="ghi_chu" name="ghi_chu">
                                <span class="text-danger error-ghi_chu"></span>
                            </div>

                            <div class="mx-auto ">
                                <label class="mt-3" for="trang_thai">Trạng thái:</label>

                                <input type="radio" name="trang_thai" id="trang_thai1" value="{{ App\Models\DichVu::AP_DUNG }}">
                                <label for="trang_thai1">Hoạt động</label>

                                <input type="radio" name="trang_thai" id="trang_thai2" value="{{ App\Models\DichVu::KET_THUC }}">
                                <label for="trang_thai2">Đang hoạt động</label><br>
                            </div>


                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success mt-3">Gửi</button>
                                <a href="{{ route('admin.dich_vu.index') }}" class="btn btn-danger mt-3 ms-3">Quay
                                    lại</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection