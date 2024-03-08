@extends('admin.layouts.master')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Phòng</th>
            <th>Loại Phòng</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten_phong}}</td>
            <td>{{$item->loai_phong->ten}}</td>
            <td>{{$item->mo_ta}}</td>
            <td>{{$item->trang_thai ? 'CÒN PHÒNG' : 'HẾT PHÒNG'}}</td>
            <td>
                <form action="{{route('admin.phong.destroy',$item)}}" method="post">
                    @csrf
                    @method('delete')
                    <a class="btn btn-warning" href="{{route('admin.phong.edit',$item)}}">SỬA</a>
                    <button  class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không ?')">XÓA</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- {{$data->Links()}} -->
@endsection