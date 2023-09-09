@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>日報登録</h2>
        </div>
    </div>

    <div class="row ml-20">
        <div class="col-sm-4">
            <h4>【案件選択】</h4>
        </div>
    </div>

    <div class="row mt-20">
        <div class="col-sm-12">
            <table class="table table-striped table-borderd" id="datatable">
                <thead>
                    <tr class="bg-success">
                        <th>顧客名</th>
                        <th>注文予定日</th>
                        <th>商談ステータス</th>
                        <th>更新区分</th>
                        <th>商品名</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($matters as $matter)
                    <tr data-href="{{route('reports.create',compact('matter','start'))}}">
                        <td>{{$matter->customer->name}}</td>
                        <td>{{$matter->expected_order_date}}</td>
                        <td>{{$matter->statuslist_label}}</td>
                        <td>{{$matter->category_label}}</td>
                        <td>{{$matter->product_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection()