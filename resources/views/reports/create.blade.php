@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>案件登録</h2>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
        <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif

    <form class="form-horizontal form-search" action="{{route('reports.store',$matter)}}" method="post" onsubmit="return confirm('この内容で登録しますか')">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-sm-12">
                <h3><i class="far fa-building"></i>【顧客情報】</h3>
            </div>
        </div>

        <div class="row">
            <label for="name" class="col-sm-2 control-label">顧客名</label>
            <div class="col-sm-4 p-0">
                <input type="text" id="name" name="name" value="{{$matter->customer->name}}" class="form-control" disabled>
                <input type=hidden name="customer_id" value="{{$matter->customer_id}}">
            </div>
        </div>

        <div class="row">
            <h3><i class="far fa-calendar-alt"></i>【注文情報】</h3>
        </div>

        <div class="row">
            <label for="start" class="col-sm-2 control-label">活動開始日</label>
            <div class="col-sm-2 p-0">
                <input type="text" name="start" class="calendar form-control" value="{{old('start',$start.' 12:00')}}">
            </div>

            <label for="end" class="col-sm-2 control-label">活動終了日</label>
            <div class="col-sm-2 p-0">
                <input type="text" name="end" class="calendar form-control" value="{{old('end')}}">
            </div>
        </div>

        <div class="row">
            <label for="status" class="col-sm-2 control-label form-label">ステータス</label>
            <div class="col-sm-2 p-0">
                @if($matter->status==\App\Models\Matter::STATUS_ORDER||$matter->status==\App\Models\Matter::STATUS_DELIVER)
                <input type="text" class="form-control" value="{{$matter->statuslist_label}}" disabled>
                <input type="hidden" name=status value="{{$matter->status}}">
                @else
                <select class="form-control" name="status" id="status">
                    @foreach(\App\Models\Matter::STATUS as $key=>$val)
                    <option value="{{$key}}" @if($matter->status==$key) selected @endif>
                        {{$val['label']}}
                    </option>
                    @endforeach
                </select>
                @endif
            </div>

            <label for="category" class="col-sm-2 control-label">更新区分</label>
            <div class="col-sm-2 p-0">
                <select class="form-control" name="category" id="category">
                    @foreach(\App\Models\Matter::CATEGORY as $key=>$val)
                    <option value="{{$key}}" @if($matter->category==$key) selected @endif>
                        {{$val['label']}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="row">
            <h3><i class="fas fa-info-circle"></i>【商品情報】</h3>
        </div>
        <div class="row">
            <label for="puroduct_name" class="col-sm-2 control-label">商品名</label>
            <div class="col-sm-4 p-0">
                <input type="text" name="product_name" class="form-control" value="{{$matter->product_name}}">
            </div>
        </div>

        <div class="row">
            <label for="description" class="col-sm-2 control-label">内容</label>
            <div class="col-sm-4 p-0">
                <input type="text" class="form-control" name="description" value="{{old('description')}}">
            </div>
        </div>

        <input type=hidden name="matter_id" value="{{$matter->id}}">

        <div class="row mt-20 mb-20">
            <div class="col-sm-4" style="text-align: left;">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" onClick="return check()">登録</button>
                </div>
            </div>
        </div>
    </form>

    @endsection