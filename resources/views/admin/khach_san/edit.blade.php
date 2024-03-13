@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật thông tin khách sạn</div>

                    <div class="card-body">
                        <form action="{{ route('admin.khach_san.update', $khach_san) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="ten">Tên</label>
                                <input type="text" name="ten" id="ten" class="form-control"
                                    value="{{ $khach_san->ten }}">
                            </div>

                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" id="logo" name="logo" class="form-control">
                                @if ($khach_san->logo)
                                    <img class="mt-3" width="150px" src="{{ Storage::url($khach_san->logo) }}"
                                        alt="">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="so_dien_thoai">Số điện thoại</label>
                                <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control"
                                    value="{{ $khach_san->so_dien_thoai }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    value="{{ $khach_san->email }}">
                            </div>

                            <div class="form-group">
                                <label for="dia_chi">Địa chỉ</label>
                                <input type="text" name="dia_chi" id="dia_chi" class="form-control"
                                    value="{{ $khach_san->dia_chi }}">
                            </div>

                            <button type="submit" class="btn btn-success">GỬI</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection