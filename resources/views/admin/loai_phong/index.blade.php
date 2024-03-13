@extends('admin.layouts.master')

@section('content')
<!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="">All Product</h4>
                        <a href="{{ route('admin.loai_phong.create') }}" class="btn btn-success">
                            <i class="bi bi-plus"></i>
                            Tạo mới</a>
                    </div>

                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Loại phòng',
        'key' => 'EasyStay',
        ])
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">Danh sách</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script>
    $(document).ready(function() {
        $('body').on('click', '.change-status', function() {
            let isChecked = $(this).is(':checked')
            console.log(isChecked);

            let id = $(this).data('id')
            $.ajax({
                url: "{{ route('admin.loai_phong.change-status') }}",
                method: 'PUT',
                data: {
                    status: isChecked,
                    id: id
                },
                success: function(data) {
                    toastr.success(data.message);
                }
            })
        })
    })
</script>
@endpush