@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="app-content-header my-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Danh sách bài viết</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Docs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Layout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tieu_de }}</td>
                        <td>
                            <img width="150px" src="{{ Storage::url($item->anh) }}" alt="">
                        </td>
                        <td>{{ $item->noi_dung }}</td>
                        <td>{{ $item->trang_thai ? 'Xuất bản' : 'Nháp' }}</td>
                        <td>
                            <form action="{{ route('admin.bai_viet.destroy', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.bai_viet.edit', $item) }}" class="btn btn-warning">SỬA</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có muốn xóa không ?')">XÓA</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
