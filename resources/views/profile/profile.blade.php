<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>

<body>
<div class="page">
    <header class="header-admin">
        <div class="header-admin__left">
            <a href="{{ route('profile_index') }}" class="header-admin__logo">
                apipay.is
            </a>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="header-admin__static">
            <div class="header-title">
                <span>Главная</span>
                <span></span>
            </div>
        </div>
        <div class="header-profile">
            <div class="hero__pay-cur-outer pay-cur-outer">
                <div class="pay-cur">
                    <img loading="lazy" src={{asset("img/lang.svg")}} alt="img">
                    <span class="pay-cur-span lang">RU</span>
                    <img loading="lazy" src={{asset("img/arrow-down.svg")}} alt="img">
                </div>
                <ul class="pay-cur-list lang-list">
                    <li class="lang-item">
                        UA
                    </li>
                    <li class="lang-item">
                        EN
                    </li>

                </ul>
            </div>
            <div class="header-profile" >
                <button class="profile-main__btn profile-hover">
                    <div class="profile__inner">
                        <img class="profile__icon1" loading="lazy" src={{asset("img/avatar.svg")}} alt="">
                        <span class="profile__text">{{ Auth::user()->name }}</span>
                        <img class="profile__icon2" loading="lazy" src={{asset("img/settings.png")}} alt="">
                    </div>
                </button>
            </div>

            <div class="profile__content">
                <a href="{{ route('profile_me') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src={{asset("img/profile.png")}} alt="">
                    <span class="profile__btn-text profile__btn-text--one">Профиль</span>
                </a>
                <a href="{{ route('profile_pcAlert') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src={{asset("img/alert.png")}} alt="">
                    <span class="profile__btn-text">Оповещения</span>
                </a>
                <a href="{{ route('profile_pcProtect') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src={{asset("img/protect.png")}} alt="">
                    <span class="profile__btn-text">Безопасность</span>
                </a>
                <a href="{{ route('profile_pcApi') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src={{asset("img/api.png")}} alt="">
                    <span class="profile__btn-text">API ключи</span>
                </a>
                <a href="{{ route('profile_changePass') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src={{asset("img/password.png")}} alt="">
                    <span class="profile__btn-text">Изменить пароль</span>
                </a>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src="{{ asset('img/exit.png') }}" alt="">
                    <span class="profile__btn-text">Выйти</span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </button>
            </div>
        </div>

    </header>



    @include('frontend/partials/sidebar')
    <nav class="nav">
        <ul class="nav__list">
{{--        @if(auth()->user()->isUser())--}}
{{--            @include('profile.__parts.leftNavigationProfile')--}}
{{--        @endif--}}


            @if(auth()->user()->isAdmin())
                @include('profile.__parts.leftNavigation')
            @endif

{{--            @if (Route::is('profile_me'))--}}
{{--                @include('profile.__parts.leftNavigationProfile')--}}

{{--            @else--}}
{{--                @include('profile.__parts.leftNavigation')--}}
{{--            @endif--}}
        </ul>
    </nav>


    <div class="page-body">

        @yield('page-body')

    </div>
</div>
<script src="{{ asset('/js/vendor.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
</body>


</html>
