@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row ml-20">
        <div class="col-sm-4">
            <h2>顧客編集</h2>
        </div>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
        <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif

    <form class="form-horizontal form-search" action="{{route('customers.update',$customer)}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('この内容に変更しますか？')">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-sm-12">
                <h3><i class="far fa-building"></i>【顧客情報登録】</h3>
            </div>
        </div>
        <div class="row">
            <label for="customer_name" class="col-sm-2 control-label">顧客名</label>
            <div class="col-sm-4 p-0">
                <input type=" text" value="{{old('name',$customer->name)}}" id="customer_name" name="name" class="form-control gray-control">
            </div>

            <label for="kana_name" class="col-sm-2 control-label">顧客名(カナ)</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('kana_name',$customer->kana_name)}}" name="kana_name" class="form-control gray-control">
            </div>
        </div>


        <div class="row">
            <label for="address" class="col-sm-2 control-label">住所</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('address',$customer->address)}}" name="address" class="form-control gray-control">
            </div>
        </div>

        <div class="row">
            <label for="mail_address" class="col-sm-2 control-label">メールアドレス</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('mail_address',$customer->mail_address)}}" name="mail_address" class="form-control gray-control">
            </div>

            <label for="phone_number" class="col-sm-2 control-label">電話番号</label>
            <div class="col-sm-4 p-0">
                <input type="text" value="{{old('phone_number',$customer->phone_number)}}" name="phone_number" class="form-control gray-control">
            </div>

            <div class="row mt-20">
                <div class="col-sm-12">
                    <h3><i class="fas fa-book-reader"></i>【顧客共有事項】</h3>
                </div>
            </div>

            <div class="row">
                <label for="key_person" class="col-sm-2 control-label">キーマン</label>
                <div class="col-sm-4 p-0">
                    <input type="text" value="{{old('key_person',$customer->key_person)}}" name="key_person" class="form-control gray-control">
                </div>
            </div>


            <div class="row">
                <label for="memo" class="control-label col-md-2">共有事項</label>
                <div class="col-sm-4 p-0">
                    <input type="text" value="{{old('memo',$customer->memo)}}" name="memo" class="form-control gray-control">
                </div>
            </div>



            <div class="row mt-20 mb-20">
                <div class="col-sm-4" style="text-align: left;">
                    <button class="btn btn-primary" type="submit" onClick="return check()">登録</button>
                </div>

                <input type="hidden" name="name_card_image_path" value="{{$customer->img_path}}">

    </form>


    <div class="col-sm-4" style="text-align:left;">
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{route('customers.destroy',$customer)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">削除</button>
        </form>
    </div>
</div>




@endsection()