@extends('layout.main.main')

@push('css')
    <style>
        p#test {
            background-color: red;
        }
    </style>
@endpush

@section('content')
    <p id="test">Test Content</p>
@endsection

@push('js')
    <script type="application/javascript">
        console.log('Javascript is working')
    </script>
@endpush