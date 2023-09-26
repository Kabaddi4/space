<!DOCYTYPE html>
<!--phpで書かれた内容の表示-->
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--CSRF token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{--共通してtitleタグを入れる--}}
        <title>@yield('title')</title>
        
        {{--Javascriptの読み込み--}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        {{--Laravelの標準css--}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上のナビゲーションバー --}}
            <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    {{--Button--}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="colapse navbar-collapse" id="navbarSupportedContent">
                        {{-- Left Side of navbar --}}
                        <ul class="navbar-nav ms-auto"></ul>
                        
                        {{-- Right Side of navbar --}}
                        <ul class="navbar-nav">
                            {{--非ログイン時--}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                        
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>
                                        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </div>   
            </nav>
            
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
    {{--JavaScript or jsファイルのリンク--}}
</html>