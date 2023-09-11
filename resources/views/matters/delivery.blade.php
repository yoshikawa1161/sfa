@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>納入状況</h2>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-sm-12">
            <table class="table table-striped table-borderd">
                <thead>
                    <tr class="bg-success">
                        <th>顧客名</th>
                        <th>商品名</th>
                        <th>納入日</th>
                        <th>更新区分</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($delivery as $matter)
                    <tr>
                        <td>{{$matter->customer->name}}</td>
                        <td>{{$matter->product_name}}</td>
                        <td>{{$matter->delivery_date}}</td>
                        <td>{{$matter->category_label}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection()