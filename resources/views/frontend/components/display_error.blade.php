@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error_message'))
    <div class="alert alert-danger alert-dismissible">
        <strong>Error!</strong> {{ Session::get('error_message') }}
    </div>
@endif
