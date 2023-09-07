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


    <form class="form-horizontal form-search" action="{{route('matters.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <h3><i class="far fa-building"></i>【顧客情報】</h3>
            </div>
        </div>


        <div class="row">
            <label for="name" class="col-sm-2 control-label">顧客名</label>
            <div class="col-sm-4 p-0">
                <input type="text" id="name" name="name" class="form-control" onchange="set_date_to();" disabled>
            </div>

            <div class="col-sm-2">
                <a href=" {{route('matters.customer_select')}}" class="btn btn-primary">顧客検索</a>
            </div>
        </div>

        <div class="row">
            <h3><i class="far fa-calendar-alt"></i>【受注情報】</h3>
        </div>

        <div class="row">
            <label for="expected_order_date" class="col-sm-2 control-label">受注予定日</label>
            <div class="col-sm-2 p-0">
                <input type="text" name="expected_order_date" class="calendar_date form-control" value="{{old('expected_order_date')}}">
            </div>
        </div>

        <div class="row">
            <label for="status" class="col-sm-2 control-label">ステータス</label>
            <div class="col-sm-2 p-0">
                <select class="form-control" name="status" id="status">
                    @foreach(\App\Models\Matter::STATUS as $key=>$val)
                    <option value="{{$key}}" @if(old('status')==$key) selected @endif>
                        {{$val['label']}}
                    </option>
                    @endforeach
                </select>
            </div>

            <label for="category" class="col-sm-2 control-label">更新区分</label>
            <div class="col-sm-2 p-0">
                <select class="form-control" name="category" id="category">
                    @foreach(\App\Models\Matter::CATEGORY as $key=>$val)
                    <option value="{{$key}}" @if(old('category')==$key) selected @endif>
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
            <label for="product_name" class="col-sm-2 control-label">商品名</label>
            <div class="col-sm-4 p-0">
                <input type="text" name="product_name" class="form-control" value="{{old('puroduct_name')}}">
            </div>
        </div>

        <div class="row mt-20 mb-20">
            <div class="col-sm-4" style="text-align: left;">
                <button class="btn btn-primary" type="submit" onClick="return check()">登録</button>
            </div>
        </div>

    </form>
</div>

@endsection