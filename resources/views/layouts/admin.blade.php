<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにittleタグを入れるため@yieldで空けておく --}}
        <title>@yield('title')</title>

        <!-- Scripots -->
        {{-- laravel標準のjava scriptを読み込む -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- laravel標準のcssを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1><a href="{{ action('Admin\MercariController@add') }}">メルカリ</a></h1>
            <form action="{{ action('Admin\MercariController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">商品名</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="pro_name" value={{ $pro_name ?? '' }}>
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
            @if(Auth::check())
                <div class="login">
                    <a href="{{ action('Admin\MercariController@own') }}" role="button" class="btn btn-primary">マイページ</a>
                    <a href="{{ action('Admin\MercariController@sell') }}" role="button" class="btn btn-primary">出品する</a>
                </div>
            @else
                <div class="login">
                    <a href="/login" role="button" class="btn btn-primary">ログイン</a>
                    <a href="/register" role="button" class="btn btn-primary">新規会員登録</a>
                </div>
            @endif
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer>
        </footer>
    </body>
</html>
