@extends('admin.layouts.master')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Ảnh phòng',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        Danh sách
                        <!-- <a href="{{ route('admin.loai_phong.index') }}" class="btn btn-danger">Back</a> -->
                    </div>

                    <div class="card-body">
                        <h5>Loại phòng: {{ $loai_phong->ten }}</h5>
                        <form enctype="multipart/form-data" action="{{ route('admin.anh_phong.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tải ảnh</label>
                                <input type="file" class="form-control" multiple name="anh[]">
                                <input type="hidden" value="{{ $loai_phong->id }}" name="loai_phong_id">
                            </div>
                            <button type="submit" class="btn btn-primary">Tải lên</button>
                        </form>
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush