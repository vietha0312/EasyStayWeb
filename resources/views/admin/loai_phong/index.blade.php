@extends('admin.layouts.master')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Giá ban đầu</th>
            <th>Giới hạn người</th>
            <th>Số lượng</th>
            <th>Mô tả ngắn</th>
            <th>Mô tả dài</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten}}</td>
            <td>
                <img width="150px" src="{{Storage::url($item->anh)}}" alt="">
            </td>
            <td>{{$item->gia}}</td>
            <td>{{$item->gia_ban_dau}}</td>
            <td>{{$item->gioi_han_nguoi}}</td>
            <td>{{$item->so_luong}}</td>
            <td>{{$item->mo_ta_ngan}}</td>
            <td>{{$item->mo_ta_dai}}</td>
            <td>{{$item->trang_thai}}</td>
            <td>
            <form action="{{route('admin.loai_phong.destroy',$item)}}" method="post">
                        @csrf
                        @method('delete')
                        <a class="btn btn-warning" href="{{route('admin.loai_phong.edit',$item)}}">SỬA</a>
                        <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">XÓA</button>
                    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection