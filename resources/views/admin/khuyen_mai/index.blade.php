@extends('admin.layouts.master')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên Khuyến Mãi</th>
            <th>Tên Phòng</th>
            <th>Mã Giảm Giá</th>
            <th>Loại Giảm Giá</th>
            <th>Mức Giảm</th>
            <th>Mô Tả</th>
            <th>Số Lượng</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Trạng Thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($khuyenMaiList as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten_khuyen_mai}}</td>
            <td>
                @if ($item->phong)
                    {{ $item->phong->ten_phong }}
                @endif
            </td>
            <td>{{$item->ma_giam_gia}}</td>
            <td>
                @if ($item->loai_giam_gia)
                    Giảm giá %
                @else
                    Giảm giá tiền
                @endif
            </td>
            <td>
                @if ($item->loai_giam_gia)
                    {{ $item->gia_tri_giam }}%
                @else
                    {{ number_format($item->gia_tri_giam) }} VNĐ
                @endif
            </td>
            <td>{{$item->mo_ta}}</td>
            <td>{{$item->so_luong}}</td>
            <td>{{$item->ngay_bat_dau}}</td>
            <td>{{$item->ngay_ket_thuc}}</td>
            <td>
                @if ($item->trang_thai == 1)
                    Đang áp dụng
                @else
                    Kết thúc
                @endif
            </td>
            <td>
                <form action="{{route('admin.khuyen_mai.destroy',$item)}}" method="post">
                    @csrf
                    @method('delete')
                    <a class="btn btn-warning" href="{{route('admin.khuyen_mai.edit',$item)}}">SỬA</a>
                    <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">XÓA</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection