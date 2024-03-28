@extends('admin.layouts.master')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Chi tiết đặt phòng',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Chi tiết đặt phòng: {{$datPhong->id}}</h5>
            </div>
            <h4>aaa</h4>
        </div>
        <a href="{{route('admin.dat_phong.index')}}" class="btn btn-danger mt-3">Quay lại</a>
    </div>

</main>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
