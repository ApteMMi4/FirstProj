
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('frontend/js/vendor.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/custom/custom.js')}}?ver=10"></script>

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
                apipay
            </a>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="header-admin__static">
            <div class="header-title">
                <span>Транзакции</span>
                <span></span>
            </div>
            <img loading="lazy" src="{{ asset('img/calendar.png') }}" alt="img">
            <div class="header-admin__static--date">
            </div>
        </div>
        <div class="header-profile" >
            <button class="profile-main__btn profile-hover">
                <div class="profile__inner">
                    <img class="profile__icon1" loading="lazy" src="{{ asset('img/avatar.svg') }}" alt="">
                    <span class="profile__text">{{ Auth::user()->name }}</span>
                    <img class="profile__icon2" loading="lazy" src="{{ asset('img/settings.png') }}" alt="">
                </div>
            </button>
            <div class="profile__content">
                <a href="{{ route('profile_adminMe') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src="{{ asset('img/profile.png') }}" alt="">
                    <span class="profile__btn-text profile__btn-text--one">Профиль</span>
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




        @if (Auth::user()->role == 'admin')

            <div class="page-content">
                <section class="static">
                    <div class="header-title">
                        <div class="header-admin__static">


                        </div>
                        <h2 class="static__title title fz18">
                            Статистика
                        </h2>
                        <div class="static__pay-turn">
                            <span>Оборот платежей</span>
                            <b><span>  {{$allSum}} UAH</span> </b>
                            <span class=pc-profile__sum"></span>
                        </div>
                        <div class="turn-system">
                            <div class="turn-system__title title fz16">

                            </div>
                            <div class="turn-system__wrap">
                                <div class="turn-system__item">
                                    <img loading="lazy" src="img/turn-system__item--icon.png" alt="img" title="UAH" >
                                    <span> {{$staticSum}} UAH</span>
                                </div>
{{--                                <div class="turn-system__item">--}}
{{--                                    <img loading="lazy" src="img/turn-system__item--icon2.png" alt="img" title="RUB">--}}
{{--                                    <span><?php--}}
{{--                                        $names = DB::table('users')->sum('RUB');--}}
{{--                                        echo $names;--}}
{{--                                        ?> RUB</span>--}}
{{--                                </div>--}}
{{--                                <div class="turn-system__item">--}}
{{--                                    <img loading="lazy" src="img/turn-system__item--icon3.png" alt="img" title="BTC">--}}
{{--                                    <span><?php--}}
{{--                                        $names = DB::table('users')->sum('BTC');--}}
{{--                                        echo $names;--}}
{{--                                        ?> BTC</span>--}}
{{--                                </div>--}}
{{--                                <div class="turn-system__item">--}}
{{--                                    <img loading="lazy" src="img/turn-system__item--icon4.png" alt="img" title="USDT">--}}
{{--                                    <span><?php--}}
{{--                                        $names = DB::table('users')->sum('USDT');--}}
{{--                                        echo $names;--}}
{{--                                        ?> USDT</span>--}}
{{--                                </div>--}}
                                {{--                <div class="turn-system__item">--}}
                                {{--                    <img loading="lazy" src="img/turn-system__item--icon5.png" alt="img">--}}
                                {{--                    <span>1,255</span>--}}
                                {{--                </div>--}}
                                {{--                <div class="turn-system__item">--}}
                                {{--                    <img loading="lazy" src="img/turn-system__item--icon6.png" alt="img">--}}
                                {{--                    <span>0,751</span>--}}
                                {{--                </div>--}}
                                {{--                <div class="turn-system__item">--}}
                                {{--                    <img loading="lazy" src="img/turn-system__item--icon7.png" alt="img">--}}
                                {{--                    <span>0,355</span>--}}
                                {{--                </div>--}}
                                {{--                <div class="turn-system__item">--}}
                                {{--                    <img loading="lazy" src="img/turn-system__item--icon8.png" alt="img">--}}
                                {{--                    <span>1,001</span>--}}
                                {{--                </div>--}}
                            </div>
                        </div>
                        <div class="chart">
                            <div class="chart__title title fz18">
                                Транзакции
                                <span>история транзакций</span>
                            </div>
                            <div class="chart__block">
                                <img loading="lazy" src="img/chart.png" alt="img">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif


    <nav class="nav">
        <ul class="nav__list">
            @if(auth()->user()->isUser())
                @include('profile.__parts.leftNavigationProfile')
            @endif


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

</body>
