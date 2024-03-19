@extends('admin.layouts.master')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Chi tiết loại phòng',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Loại phòng: {{$loai_phong->ten}}</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Ten</th>
                        <th>Anh</th>
                        <th>Gia</th>
                        <th>Gia_ban_dau</th>
                        <th>Gioi han nguoi</th>
                        <th>So luong</th>
                        <th>Mo ta ngan</th>
                        <th>Mo ta dai</th>
                        <th>Trang thai</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <td>{{ $loai_phong->id }}</td>
                        <td>{{ $loai_phong->ten }}</td>
                        <td>
                            <img width="150px" src="{{Storage::url($loai_phong->anh)}}" alt="">
                        </td>
                        <td>{{ $loai_phong->gia }}</td>
                        <td>{{ $loai_phong->gia_ban_dau }}</td>
                        <td>{{ $loai_phong->gioi_han_nguoi }}</td>
                        <td>{{ $loai_phong->so_luong }}</td>
                        <td>{{ $loai_phong->mo_ta_ngan }}</td>
                        <td>{{ $loai_phong->mo_ta_dai }}</td>
                        <td>{{ $loai_phong->trang_thai ? 'Còn phòng' : 'Hết phòng' }}</td>
                        <td>
                            <a href="{{route('admin.loai_phong.edit',$loai_phong->id)}}" class="btn btn-primary"><i class='bi bi-pen'></i></a>
                        </td>

                    </tbody>

                </table>
            </div>
        </div>
        <a href="{{route('admin.loai_phong.index')}}" class="btn btn-danger mt-3">Quay lại</a>
    </div>

</main>
@endsection