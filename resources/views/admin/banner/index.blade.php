@extends('admin.layouts.master')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Trạng Thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="{{ asset('storage/banners/' . $item->anh) }}" alt="Ảnh" width="150px">
                    </td>
                    <td>{{ $item->mo_ta }}</td>
                    @if ($item->trang_thai == '1')
                        <td>Hoạt động</td>
                    @else
                        <td>Không hoạt động</td>
                    @endif
                    <td>
                        <form action="{{ route('admin.banners.destroy', $item->id) }}" method="POST">

                            <a class="btn btn-warning" href="{{ route('admin.banners.edit', $item->id) }}">SỬA</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có muốn xóa không ?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.banners.index') }}" class="btn btn-warning">Thêm mới</a>
@endsection
