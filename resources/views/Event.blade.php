@extends('layouts.app4')

@section('content')
    <div class="container">


        <div class="panel panel-primary">
            <div class="panel-heading">Details Evenement</div>
            <div class="panel-body" >
                {!! $calendar_details->calendar() !!}
            </div>
        </div>

    </div>
@endsection

