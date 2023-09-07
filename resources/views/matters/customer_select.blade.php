@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>案件登録</h2>
        </div>
    </div>

    <div class="row ml-20">
        <div class="col-sm-4">
            <h4>【顧客選択】</h4>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-sm-12">

            <table class="table table-striped table-borderd" id="datatable">
                <thead>
                    <tr class="bg-success">
                        <th>得意先名</th>
                        <th>得意先名よみがな</th>
                        <th>住所</th>
                        <th>電話番号</th>
                        <th>メールアドレス</th>
                        <th>キーマン</th>
                        <th>共有事項</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($customers as $customer)
                    <tr data-href="{{route('matters.create',$customer)}}">
                        <td>{{$customer->name}}</a></td>
                        <td>{{$customer->kana_name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phone_number}}</td>
                        <td>{{$customer->mail_address}}</td>
                        <td>{{$customer->key_person}}</td>
                        <td>{{$customer->memo}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection()