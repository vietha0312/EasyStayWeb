@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h2>Thông tin khách sạn</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->ten }}</td>
                        <td>
                            <img src="{{ Storage::url($item->logo) }}" alt="logo ở đây" class="img-thumbnail"
                                style="max-width: 150px;">
                        </td>

                        <td>{{ $item->so_dien_thoai }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->dia_chi }}</td>
                        <td>
                            <a href="{{ route('admin.khach_san.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
