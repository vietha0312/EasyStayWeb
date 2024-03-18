@extends('admin.layouts.master')
@section('content')

<main class="app-main">
<div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Khách sạn',
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
                        <h5>Cập nhật thông tin khách sạn</h5>
                    </div>

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

                            <div class="form-group mt-3">
                                <label for="logo">Logo</label>
                                <input type="file" id="logo" name="logo" class="form-control">
                                @if ($khach_san->logo)
                                    <img class="mt-3" width="150px" src="{{ Storage::url($khach_san->logo) }}"
                                        alt="">
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="so_dien_thoai">Số điện thoại</label>
                                <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control"
                                    value="{{ $khach_san->so_dien_thoai }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    value="{{ $khach_san->email }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="dia_chi">Địa chỉ</label>
                                <input type="text" name="dia_chi" id="dia_chi" class="form-control"
                                    value="{{ $khach_san->dia_chi }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control"
                                    value="{{ $khach_san->facebook }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="form-control"
                                    value="{{ $khach_san->instagram }}">
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Gửi</button>
                            <a class="btn btn-danger mt-3" href="{{route('admin.khach_san.index')}}">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
