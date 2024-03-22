@extends('admin.layouts.master')
@section('content')
    <main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Liên hệ',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Câu hỏi</th>
                        <th>Comment</th>
                    </thead>

                    @foreach ($lienhe as $item )
                    <tbody>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>{{ $item->comments }}</td>
                    </tbody>
                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

