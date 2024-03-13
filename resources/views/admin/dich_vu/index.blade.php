@extends('admin.layouts.master')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên Dịch Vụ</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Trạng Thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dichVuList as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten_dich_vu}}</td>
            <td>{{ number_format($item->gia, 0) }} VNĐ</td>
            <td>{{$item->so_luong}}</td>
            <td>
                @if ($item->trang_thai == 1)
                    Hoạt động
                @else
                    Ngừng hoạt động
                @endif
            </td>
            <td>
                <form action="{{route('admin.dich_vu.destroy',$item)}}" method="post">
                    @csrf
                    @method('delete')
                    <a class="btn btn-warning" href="{{route('admin.dich_vu.edit',$item)}}">SỬA</a>
                    <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">XÓA</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
