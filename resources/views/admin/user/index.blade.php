@extends('admin.layouts.master')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item )
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten_nguoi_dung}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->dia_chi}}</td>
                <td>{{$item->so_dien_thoai}}</td>
                <td>{{$item->vaitro->ten_chuc_vu ?? ''}}</td>
                <td>
                    <form action="{{route('admin.user.destroy',$item)}}" method="post">
                        @csrf
                        @method('delete')
                        <a class="btn btn-warning" href="{{route('admin.user.edit',$item)}}">Sửa</a>
                        <button onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{$data->Links()}}
@endsection
