@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>案件リスト</h2>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-sm-12">
            <table class="table table-striped table-borderd">
                <thead>
                    <tr class="bg-success">
                        <th>顧客名</th>
                        <th>注文予定日</th>
                        <th>商談ステータス</th>
                        <th>更新区分</th>
                        <th>商品名</th>
                        <th>見積もり</th>
                        <th>日報</th>
                        <th>編集</th>
                        <th>受注確定</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($matters as $matter)
                    <tr>
                        <td>{{$matter->customer->name}}</td>
                        <td>{{$matter->expected_order_date}}</td>
                        <td>{{$matter->status_label}}</td>
                        <td>{{$matter->category_label}}</td>
                        <td>{{$matter->product_name}}</td>
                        <td>
                            <form action="{{route('estimates.create',$matter)}}" method="get">
                                <input class="btn btn-secondary" type="submit" value="作成">
                            </form>
                        <td>
                            <form action="{{route('reports.list',$matter)}}" method="get">
                                <input class="btn btn-info" type="submit" value="履歴">
                            </form>

                        </td>
                        <td>
                            <form action="{{route('matters.edit',$matter)}}" method="get">
                                <input class="btn btn-success" type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                            <form action="{{route('matters.order_status',$matter)}}" method="post" onsubmit="return confirm('受注確定を行いますか?')">
                                <input class="btn btn-danger" type="submit" onClick="return check()" value="受注確定">
                                <input type="hidden" name="status" value=5>
                                @csrf
                                @method('patch')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection()