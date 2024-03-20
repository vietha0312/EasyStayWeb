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
                    <h5>Tạo mới loại phòng</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.loai_phong.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 mx-auto w-50">
                            <label for="ten">Tên</label>
                            <input type="text" name="ten" id="ten" class="form-control">
                        </div>

                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="anh">Ảnh</label>
                            <input type="file" name="anh" id="anh" class="form-control">
                        </div>

                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="anh">Giá</label>
                            <input type="text" name="gia" id="gia" class="form-control">
                        </div>

                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="gia_ban_dau">Giá ban đầu</label>
                            <input type="text" name="gia_ban_dau" id="gia_ban_dau" class="form-control">
                        </div>

                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="gioi_han_nguoi">Giới hạn người</label>
                            <input type="text" name="gioi_han_nguoi" id="gioi_han_nguoi" class="form-control">
                        </div>

                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="so_luong">Số lượng</label>
                            <input type="text" name="so_luong" id="so_luong" class="form-control">
                        </div>

                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="mo_ta_ngan">Mô tả ngắn</label>
                            <input type="text" name="mo_ta_ngan" id="mo_ta_ngan" class="form-control">
                        </div>

                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="mo_ta_dai">Mô tả dài</label>
                            <input type="text" name="mo_ta_dai" id="mo_ta_dai" class="form-control">
                        </div>


                        <div class="mb-3 mx-auto w-50">
                            <label class="mt-3" for="trang_thai">Trạng thái:</label>

                            <input type="radio" name="trang_thai" id="trang_thai1"
                                value="{{ App\Models\Loai_phong::CON_PHONG }}">
                            <label for="trang_thai1">CÒN PHÒNG</label>

                            <input type="radio" name="trang_thai" id="trang_thai2"
                                value="{{ App\Models\Loai_phong::HET_PHONG }}">
                            <label for="trang_thai2">HẾT PHÒNG</label> <br>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success mt-3 ">GỬI</button>
                            <a class="btn btn-danger mt-3 ms-3" href="{{ route('admin.loai_phong.index') }}">Quay lại</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
