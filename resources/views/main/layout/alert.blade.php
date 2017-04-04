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

@if(session('impersonating'))
    <div class="alert alert-warning">
        <strong>IMPOSTER!</strong>
        You are currently pretending to be this user
        click <strong><a href="{{ route('impersonate.stop') }}">HERE</a></strong> to stop.
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