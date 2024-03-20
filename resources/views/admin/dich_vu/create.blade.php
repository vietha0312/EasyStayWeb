@extends('admin.layouts.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            @include('admin.layouts.components.content-header', [
                'name' => 'Dịch vụ',
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
                            <h5>Tạo mới dịch vụ</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.dich_vu.store') }}" method="post" id="addServiceForm">
                                @csrf
                                
                                <div class="form-group mx-auto w-50">
                                    <label for="ten">Tên Dịch Vụ</label>
                                    <input type="text" class="form-control" id="ten" name="ten_dich_vu"
                                        placeholder="Nhập tên dịch vụ">
                                    <span class="text-danger error-ten"></span>
                                </div>
                                <div class="form-group mt-3 mx-auto w-50">
                                    <label for="gia">Giá</label>
                                    <input type="number" class="form-control" id="gia" name="gia"
                                        placeholder="Nhập giá dịch vụ">
                                    <span class="text-danger error-gia"></span>
                                </div>
                                <div class="form-group mt-3 mx-auto w-50">
                                    <label for="so_luong">Số Lượng</label>
                                    <input type="number" class="form-control" id="so_luong" name="so_luong"
                                        placeholder="Nhập số lượng dịch vụ">
                                    <span class="text-danger error-so_luong"></span>
                                </div>

                                <div class="mx-auto w-50">
                                    <label class="mt-3" for="trang_thai">Trạng thái:</label>

                                    <input type="radio" name="trang_thai" id="trang_thai1"
                                        value="{{ App\Models\DichVu::AP_DUNG }}">
                                    <label for="trang_thai1">Hoạt động</label>

                                    <input type="radio" name="trang_thai" id="trang_thai2"
                                        value="{{ App\Models\DichVu::KET_THUC }}">
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
