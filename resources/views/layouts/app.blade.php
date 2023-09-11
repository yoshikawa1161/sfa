<!doctype html>
<html lang="ja" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>営業管理システム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- デフォルトのスタイルシート -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- ブルーテーマの追加スタイルシート -->
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

    <link href="/main.css" rel="stylesheet">

    <!-- flatpickrスクリプト -->
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <!-- 日本語化のための追加スクリプト -->
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 m-0 fixed-top ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">営業管理システム</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        顧客
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('customers.create')}}">顧客登録</a>
                        <a class="dropdown-item" href="{{route('customers.index')}}">顧客リスト</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-hasapoup="true" aria-expanded="false">
                        案件
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('matters.create_first')}}">案件登録</a>
                        <a class="dropdown-item" href="{{route('matters.index')}}">案件リスト</a>
                        <a class="dropdown-item" href="{{route('matters.order_list')}}">受注リスト</a>
                        <a class="dropdown-item" href="{{route('matters.delivery_list')}}">納入リスト</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('reports.index')}}">日報</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-hasapoup="true" aria-expanded="false">
                        マップ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('maps.delivery_map')}}">納入先</a>
                        <a class="dropdown-item" href="{{route('maps.approach_map')}}">アプローチ</a>
                    </div>
                </li>


            </ul>
            <form action="{{route('logout')}}" method="post" onsubmit="return confirm('ログアウトしますか？')">
                <input class="btn btn-secondary" type="submit" value="ログアウト">
                @csrf
            </form>
        </div>
    </div>
</nav>
<main class="container">
    @yield('content')

</main>
<script src="{{ asset('/js/main.js') }}"></script>