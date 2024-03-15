@extends('admin.layouts.master')
@section('content')

<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Banner',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Banner</h5>
                    </div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('admin.banners.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tải ảnh</label>
                                <input type="file" class="form-control" multiple name="anh[]">
                            </div>
                            <button type="submit" class="btn btn-success">Tải lên</button>

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
