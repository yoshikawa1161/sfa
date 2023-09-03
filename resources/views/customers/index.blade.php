@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>顧客リスト</h2>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-sm-12">
            <table class="table table-striped table-borderd" id="datatable">
                <thead>
                    <tr class="bg-success">
                        <th>顧客名</th>
                        <th>顧客名(カナ)</th>
                        <th>住所</th>
                        <th>電話番号</th>
                        <th>メールアドレス</th>
                        <th>キーマン</th>
                        <th>共有事項</th>
                        <th>名刺</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($customers as $customer)
                    <tr data-href="{{route('customers.edit',$customer)}}">
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->kana_name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phone_number}}</td>
                        <td>{{$customer->mail_address}}</td>
                        <td>{{$customer->key_person}}</td>
                        <td>{{$customer->memo}}</td>
                        <td style="width:50px"><img src="{{ Storage::url($customer->img_path) }}" width="100%"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection()