@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>顧客登録</h2>
        </div>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
        <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif

    <form class="form-horizontal form-search" action="{{route('customers.store')}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('この内容で登録しますか？')">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <h3><i class="far fa-building"></i>【顧客情報】</h3>
            </div>
        </div>
        <div class="row">
            <label for="customer_name" class="col-sm-2 control-label">顧客名</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('name')}}" id="customer_name" name="name" class="form-control gray-control">
            </div>

            <label for="kana_name" class="col-sm-2 control-label">顧客名(カナ)</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('kana_name')}}" name="kana_name" class="form-control gray-control">
            </div>
        </div>


        <div class="row">
            <label for="address" class="col-sm-2 control-label">住所</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('address')}}" name="address" class="form-control gray-control">
            </div>
        </div>


        <div class="row">
            <label for="mail_address" class="col-sm-2 control-label">メールアドレス</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('mail_address')}}" name="mail_address" class="form-control gray-control">
            </div>

            <label for="phone_number" class="col-sm-2 control-label">電話番号</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('phone_number')}}" name="phone_number" class="form-control gray-control">
            </div>
        </div>



        <div class="row mt-20">
            <div class="col-sm-12">
                <h3><i class="fas fa-book-reader"></i> 【共有事項】</h3>
            </div>
        </div>

        <div class="row">
            <label for="key_person" class="col-sm-2 control-label">キーマン</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('key_person')}}" name="key_person" class="form-control gray-control">
            </div>
        </div>

        <div class="row">
            <label for="memo" class="col-sm-2 control-label">共有事項</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('memo')}}" name="memo" class="form-control gray-control">
            </div>
        </div>


        {{-- 名刺画像 --}}
        <div class="row mb-3">
            <label for="name_card" class="col-sm-2 control-label">{{ __('名刺') }}</label>
            <div class="col-sm-4 p-0">
                <input id="name_card" type="file" class="form-control" accept="image/*" name="name_card_image_path" onchange="setImage">
            </div>
        </div>


        {{-- 名刺画像プレビュー表示 --}}
        <div class="text-cente h-50">
            <img id="name_card_img_prv" class="img-thumbnail h-50 w-50" alt="名刺画像はありません">
        </div>


        <div class="row mt-20 mb-20">
            <div class="col-sm-4" style="text-align: left;">
                <button class="btn btn-primary" type="submit">登録</button>
            </div>
        </div>

    </form>
</div>
@endsection()