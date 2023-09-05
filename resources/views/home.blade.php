@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-4">
        <h2>マイページ</h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <p class="h4">ようこそ、{{Auth::user()->name}}さん</p>
    </div>
</div>

@endsection()