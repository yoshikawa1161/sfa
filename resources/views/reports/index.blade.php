@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row ml-20">
        <div id='calendar'></div>
    </div>
</div>
@endsection()
<script src="{{ asset('/js/fullcalendar.js') }}"></script>