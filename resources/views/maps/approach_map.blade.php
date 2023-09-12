@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mt-0">
        <div class="col-sm-4">
            <h2>アプローチ</h2>
        </div>
    </div>
    <div class="row mt-20">
        <div id="map" style="height:800px">
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7fCDwZQcxJPzj89YDp22N0RnjuR0DXtU&libraries=places&callback=initMap" defer></script>

<script src="{{asset('/js/approach_map.js')}}"></script>

@endsection