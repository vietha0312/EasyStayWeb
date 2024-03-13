@extends('admin.layouts.master')

@section('content')
    <main class="app-main">
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

        <div class="app-content-header">
            @include('admin.layouts.components.content-header', [
                'name' => 'Đơn đặt phòng',
                'key' => 'Index',
            ])
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Điền thông tin</h3>
                            </div>

                            <form action="{{ route('admin.don_dat.update', $don_dat) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 mx-auto w-50">
                                    <label for="" class="form-label">Mã phòng</label>
                                    <input type="text" class="form-control" name="ma_phong" id="ma_phong"
                                        value="{{ $don_dat->ma_phong }}">
                                </div>

                                <div class="mb-3 mx-auto w-50">
                                    <label for="" class="form-label">Ngày đặt</label>
                                    <input type="date" class="form-control" name="ngay_dat" id="ngay_dat"
                                        value="{{ $don_dat->ngay_dat }}">
                                </div>

                                <div class="mb-3 mx-auto w-50">
                                    <label for="" class="form-label">Mã khách hàng</label>
                                    <input type="text" class="form-control" name="khach_hang_id" id="khach_hang_id"
                                        value="{{ $don_dat->khach_hang_id }}">
                                </div>

                                <div class="mb-3 mx-auto w-50">
                                    <label for="" class="form-label">Payment</label>
                                    <input type="text" class="form-control" name="payment" id="payment"
                                        value="{{ $don_dat->payment }}">
                                </div>

                                <div class="mb-3 mx-auto w-50">
                                    <label for="" class="form-label">Ghi chú</label>
                                    <input type="text" class="form-control" name="ghi_chu" id="ghi_chu"
                                        value="{{ $don_dat->ghi_chu }}">
                                </div>

                                <div class="mb-3 mx-auto w-50">
                                    <label for="trang_thai" class="form-label">Trạng thái</label>
                                </div>

                                <div class="mb-3 mx-auto w-50">
                                    <input type="radio" name="trang_thai" id="trang_thai-1"
                                        @if ($don_dat->trang_thai == \App\Models\Don_dat::DA_XAC_NHAN) checked @endif
                                        value="{{ \App\Models\Don_dat::DA_XAC_NHAN }}">
                                    <label for="trang_thai" class="form-label">Đã xác nhận</label>

                                    <input type="radio" name="trang_thai" id="trang_thai-2"
                                        @if ($don_dat->trang_thai == \App\Models\Don_dat::CHO_XAC_NHAN) checked @endif
                                        value="{{ \App\Models\Don_dat::CHO_XAC_NHAN }}">
                                    <label for="trang_thai" class="form-label">Chờ xác nhận</label>
                                </div>

                                <div class="d-flex justify-content-center mb-3">
                                    <a href="{{ route('admin.don_dat.index') }}" class="btn btn-warning">Quay lại</a>
                                    <button type="submit" class="btn btn-primary ms-3">Cập nhập</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
