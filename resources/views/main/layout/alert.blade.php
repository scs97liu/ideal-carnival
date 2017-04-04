@if(session('success'))
<div class="alert alert-success">
    <strong>Success!</strong> {!! session('success') !!}
</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <strong>Error!</strong> {!! session('error') !!}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif