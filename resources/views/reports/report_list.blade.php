@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>日報履歴</h2>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-sm-12">
            <table class="table table-striped table-borderd">
                <thead>
                    <tr class="bg-success">
                        <th>活動開始日</th>
                        <th>活動終了日</th>
                        <th>商談ステータス</th>
                        <th>更新区分</th>
                        <th>商品名</th>
                        <th>内容</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{substr($report->start, 0, 16)}}</th>
                        <td>{{substr($report->end, 0, 16)}}</th>
                        <td>{{$report->status_label}}</td>
                        <td>{{$report->category_label}}</td>
                        <td>{{$report->product_name}}</td>
                        <td>{{$report->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection()