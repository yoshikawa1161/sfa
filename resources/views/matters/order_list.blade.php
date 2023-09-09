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
                        <th>受注予定日</th>
                        <th>更新区分</th>
                        <th>商品名</th>
                        <th>日報</th>
                        <th>納入済み</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($matters as $matter)
                    <tr>
                        <td>{{$matter->customer->name}}</td>
                        <td>{{$matter->expected_order_date}}</td>
                        <td>{{$matter->category_label}}</td>
                        <td>{{$matter->product_name}}</td>

                        <td>
                            <form action="{{route('matters.delivery_status',$matter)}}" method="post">
                                <input class="btn btn-warning" type="submit" onClick="return check()" value="登録">
                                <input type="hidden" name="status" value=6>
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