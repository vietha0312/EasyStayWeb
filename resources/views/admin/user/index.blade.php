@extends('admin.layouts.master')
@section('content')
@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Người dùng',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách</h5>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
