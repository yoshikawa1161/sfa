@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>案件編集</h2>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
        <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif


    <form class="form-horizontal form-search" action="{{route('matters.update',$matter)}}" method="post" onsubmit="return confirm('この内容に変更しますか？')">
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
                <input type="text" id="name" name="name" value="{{$matter->customer->name}}" class="form-control" readonly>
                <input type="hidden" name="customer_id" value="{{$matter->customer->id}}">
            </div>
        </div>


        <div class="row">
            <h3><i class="far fa-calendar-alt"></i>【受注情報】</h3>
        </div>

        <div class="row">
            <label for="expected_order_date" class="col-sm-2 control-label">受注予定日</label>
            <div class="col-sm-2 p-0">
                <input type="text" name="expected_order_date" value="{{$matter->expected_order_date}}" class="calendar_date form-control">
            </div>
        </div>

        <div class="row">
            <label for="status" class="col-sm-2 control-label form-label">ステータス</label>
            <div class="col-sm-2 p-0">
                <select class="form-control" name="status" id="status">
                    @foreach(\App\Models\Matter::STATUS as $key=>$val)
                    <option value="{{$key}}" @if($matter->status==$key) selected @endif>
                        {{$val['label']}}
                    </option>
                    @endforeach
                </select>
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


        <div class="row mt-20 mb-20">
            <div class="col-sm-4" style="text-align: left;">
                <button class="btn btn-primary" type="submit" onClick="return check()">登録</button>
            </div>
    </form>

    <div class="col-sm-4" style="text-align:left;">
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{route('matters.destroy',$matter)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">削除</button>
        </form>
    </div>
</div>

@endsection