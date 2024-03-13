@extends('admin.layouts.master')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nội Dung</th>
                <th>Ảnh</th>
                <th>User Id</th>
                <th>Phòng Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
           
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->noi_dung }}</td>
                    <td>
                        <img src="{{ asset('storage/loai_phong/' . $item->anh) }}" alt="Ảnh" width="150px">
                    </td>
                    <td>{{$item->user->name ?? ""}}</td>
                    <td>{{$item->phong->ten_phong ?? ""}}</td>
                    
                   
                    <td>
                        <form action="{{ route('admin.danh_gia.destroy', $item->id) }}" method="POST">

                           
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có muốn ẩn không ?')">Ẩn bình luận</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
@endsection
