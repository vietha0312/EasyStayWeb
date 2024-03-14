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
            <div class="card-header">Loại phòng: {{$loai_phong->ten}}</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Giới hạn người</th>
                        <th>Mô tả ngắn</th>
                        <th>Mô tả dài</th>
                    </thead>

                    <tbody>
                        <td>{{ $loai_phong->gioi_han_nguoi }}</td>
                        <td>{{ $loai_phong->mo_ta_ngan }}</td>
                        <td>{{ $loai_phong->mo_ta_dai }}</td>

                    </tbody>

                </table>
            </div>
        </div>
        <a href="{{route('admin.loai_phong.index')}}" class="btn btn-danger mt-3">Quay lại</a>
    </div>

</main>
@endsection