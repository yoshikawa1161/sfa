@extends('layouts.helloapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>ログイン</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ログイン') }}</div>

                <div class="card-body">
                    <form action="{{ route('login') }}" method="post" class="align-items-center">
                        @csrf

                        <div class="row g-3 pb-3">
                            <label for="email" class="col-md-4 form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3 pb-3">
                            <label for="password" class="col-md-4 form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3 pb-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">ログイン</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()