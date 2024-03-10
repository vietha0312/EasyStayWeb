@if (Session::has('success'))
    <div class="alert alert-success " role="alert">
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger " role="alert">
        <strong>{{ Session::get('error') }}</strong>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger " role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
