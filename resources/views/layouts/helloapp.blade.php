<!doctype html>
<html lang="ja" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>営業管理システム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/main.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand  navbar-dark bg-dark p-0 fixed-top ">
        <div class="collapse navbar-collapse" id="bs-navi">
            <a class="navbar-brand" href="#">営業管理システム</a>
        </div>
        <button onclick="location.href='{{route('guestlogin')}}'" class="btn btn-secondary m-4">ゲストログイン</button>
        <button onclick="location.href='{{route('login')}}'" class="btn btn-secondary m-4">ログイン</button>
        <button onclick="location.href='{{route('register')}}'" class="btn btn-secondary m-4">新規登録</button>
    </nav>

    <main class=" container">
        @yield('content')

    </main>
    <script src="{{ asset('/js/fullcalendar.js') }}"></script>