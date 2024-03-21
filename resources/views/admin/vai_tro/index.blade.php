@extends('admin.layouts.master')
@section('content')
@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Chức vụ</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ten_chuc_vu}}</td>
            <td>{{$item->mo_ta}}</td>
            <td>{{$item->trang_thai ? 'Hoạt Động' : 'Dừng Hoạt Động'}}</td>
            <td>
                <form action="{{route('admin.vai_tro.destroy',$item)}}" method="post">
                    @csrf
                    @method('delete')
                    <a class="btn btn-warning" href="{{route('admin.vai_tro.edit',$item)}}">SỬA</a>
                    <button  class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không ?')">XÓA</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- {{$data->Links()}} -->
@endsection
