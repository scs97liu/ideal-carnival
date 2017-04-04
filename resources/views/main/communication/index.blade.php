@extends('main.layout.main')

@section('content')
    <div class="portlet box">
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width: 20%"> Date/Time </th>
                        <th style="width: 10%"> Sent By </th>
                        <th style="width: 40%"> Message </th>
                        <th style="width: 5%">  </th>
                        <th style="width: 25%"> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($communications as $communication)
                        <tr>
                            <td>{{ $communication->created_at }}</td>
                            <td>{{ $communication->sender->present()->fullName }}</td>
                            <td>{{ $communication->text }}</td>
                            <td>
                                @if(!$communication->viewed)
                                    <i class="fa fa-envelope"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('communication.show', $communication->id) }}" class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-search"></i> View
                                </a>
                                <a href="{{ route('communication.create', ['id' => $communication->id]) }}" class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-reply"></i> Reply
                                </a>
                                <a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase delete-log" data-id="{{ $communication->id }}">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form id="range-form">
        <input type="hidden" id="range-start" name="start">
        <input type="hidden" id="range-end" name="end">
    </form>
@endsection
