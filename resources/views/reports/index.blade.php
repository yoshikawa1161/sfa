@extends('layouts.app')
@section('content')
<script src="{{ asset('/js/fullcalendar.js') }}"></script>

<div class="container">
    <div class="row ml-20">
        <div id='calendar'></div>
    </div>
</div>
@endsection()