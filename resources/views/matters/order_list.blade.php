@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>受注確定リスト</h2>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-sm-12">
            <table class="table table-striped table-borderd">
                <thead>
                    <tr class="bg-success">
                        <th>顧客名</th>
                        <th>商品名</th>
                        <th>受注確定日</th>
                        <th>更新区分</th>
                        <th>日報</th>
                        <th>納入</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($matters as $matter)
                    <tr>
                        <td>{{$matter->customer->name}}</td>
                        <td>{{$matter->product_name}}</td>
                        <td>{{$matter->order_date}}</td>
                        <td>{{$matter->category_label}}</td>
                        <td>
                            <form action="{{route('reports.list',$matter)}}" method="get">
                                <input class="btn btn-info" type="submit" value="履歴">
                            </form>
                        </td>
                        <td>
                            <form action="{{route('matters.delivery_status',$matter)}}" method="get">
                                <input class="btn btn-warning" type="submit" onClick="return check()" value="登録">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function check() {
        var result = window.confirm('納入済みに登録しますか？');
        if (result) {
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection()