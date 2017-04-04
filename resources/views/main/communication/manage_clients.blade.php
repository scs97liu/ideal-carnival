@extends('main.layout.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/forms.css') }}">
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Current Clients</h3>
                </div>
            </div>
            <hr>
            <div class="mt-element-card mt-element-overlay">
                <div class="row">
                    @foreach($connections as $connection)
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                            <div class="mt-card-item">
                                <div class="mt-card-avatar mt-overlay-1">
                                    <img src="{{ $connection->present()->gravatar }}" />
                                    <div class="mt-overlay">
                                        <ul class="mt-info">
                                            <li>
                                                <a class="btn default btn-outline" href="{{ route('communication.create', ['id' => $connection->id ]) }}">
                                                    <i class="fa fa-paper-plane-o"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn default btn-outline" href="{{ route('impersonate', $connection->id) }}">
                                                    <i class="fa fa-user-secret"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-card-content">
                                    <h3 class="mt-card-name">{{ $connection->present()->fullName }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection