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
            <a href="{{ route('profile_dashboard') }}" class="header-admin__logo">
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
                <div class="profile-main__btn profile-hover">
                    <div class="profile__inner">
                        <img class="profile__icon1" loading="lazy" src={{asset("img/avatar.svg")}} alt="">
                        <span class="profile__text">{{ Auth::user()->name }}</span>
                        <img class="profile__icon2" loading="lazy" src={{asset("img/settings.png")}} alt="">
                    </div>
                </div>
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
                <a href="pc-api" class="profile__btn profile-hover">
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



    <nav class="nav">
        <ul class="nav__list ">
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/home.svg")}} alt="img">
                <a href="{{route('profile_statUser')}}" class="nav__link">Главная</a>
            </li>

            <li class="nav__item">
                <img loading="lazy" src={{asset("img/exch.svg")}} alt="img">
                <a href="{{route('profile_exchange')}}" class="nav__link">Обмен</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/transfers.svg")}} alt="img">
                <a href="{{route('profile_transfers')}}" class="nav__link">Переводы</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/pay-code.svg")}} alt="img">
                <a href="{{route('profile_payCode')}}" class="nav__link">Pay-Code</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/story.svg")}} alt="img">
                <a href="{{route('profile_userTransact')}}" class="nav__link ">История</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/withdrawal.svg")}} alt="img">
                <span class="nav__link ">Выводы</span>
                <ul class="submenu">
                    <li class="submenu__item">
                        <a href="{{route('profile_conclusionsCreate')}}" class="submenu__link ">Создать</a>
                    </li>
                    <li class="submenu__item">
                        <a href="{{ route('profile_conclusionsUser') }}" class="submenu__link ">История</a>
                    </li>
                    <li class="submenu__item">
                        <a href="{{ route('profile_conclusionsPays') }}" class="submenu__link ">Массовые выплаты</a>
                    </li>
                    <li class="submenu__item">
                        <a href="{{ route('profile_sample') }}" class="submenu__link ">Шаблоны</a>
                    </li>
                    {{--						<li class="submenu__item">--}}
                    {{--							<a href="discount" class="submenu__link ">Скидка</a>--}}
                    {{--						</li>--}}
                </ul>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/verify.svg")}} alt="img">
                <a href="{{route('profile_verify')}}" class="nav__link ">Верификация</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/payment.svg")}} alt="img">
                <a href="{{route('profile_arbitraryPayment')}}" class="nav__link @link6">Произвольный платеж</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/news.svg")}} alt="img">
                <a href="{{route('profile_news')}}" class="nav__link @link7">Новости</a>
            </li>
        </ul>
        {{--	<a class="nav__link nav__link--bottom" href="https://docs.apipay.is">Документация</a>
            <a class="nav__link nav__link--bottom" href="#">Техническая поддержка</a>--}}
    </nav>




@section('page-body')
<body>

<div class="page-content">
    <section class="discount">
        <h2 class="discount__title title fz18">Ваша скидка 0,1 %</h2>

        <div class="list-wrapper discount__list">
            <div class="list list__titles list__titles-discount">
                <div class="list__item discount__item1 list__title">
                    Оборот
                </div>
                <div class="list__item discount__item2 list__title">
                    $
                </div>
            </div>
            <div class="list discount__list">
                <div class="list__item discount__item1">
                    <span>от 1000$ </span>
                </div>
                <div class="list__item discount__item2">
                    <span>0.1%</span>
                </div>
            </div>
            <div class="list discount__list">
                <div class="list__item discount__item1">
                    <span>от 10000$ </span>
                </div>
                <div class="list__item discount__item2">
                    <span>0.2%</span>
                </div>
            </div>
            <div class="list discount__list">
                <div class="list__item discount__item1">
                    <span>от 25000$ </span>
                </div>
                <div class="list__item discount__item2">
                    <span>0.3%</span>
                </div>
            </div>
            <div class="list discount__list">
                <div class="list__item discount__item1">
                    <span>от 100000$ </span>
                </div>
                <div class="list__item discount__item2">
                    <span>0.4%</span>
                </div>
            </div>
            <div class="list discount__list">
                <div class="list__item discount__item1">
                    <span>от 250000$ </span>
                </div>
                <div class="list__item discount__item2">
                    <span>0.5%</span>
                </div>
            </div>
            <div class="list discount__list">
                <div class="list__item discount__item1">
                    <span>от 1000000$ </span>
                </div>
                <div class="list__item discount__item2">
                    <span>1%</span>
                </div>
            </div>
        </div>
    </section>
</div>

</div>
<script src="js/vendor.js"></script>
<script src="js/main.js"></script>
</body>

@endsection

{{--<nav class="nav">--}}
{{--    <ul class="nav__list">--}}
{{--        @if(auth()->user()->isUser())--}}
{{--            @include('profile.__parts.leftNavigationProfile')--}}
{{--        @endif--}}


{{--        @if(auth()->user()->isAdmin())--}}
{{--            @include('profile.__parts.leftNavigation')--}}
{{--        @endif--}}

{{--        --}}{{--            @if (Route::is('profile_me'))--}}
{{--        --}}{{--                @include('profile.__parts.leftNavigationProfile')--}}

{{--        --}}{{--            @else--}}
{{--        --}}{{--                @include('profile.__parts.leftNavigation')--}}
{{--        --}}{{--            @endif--}}
{{--    </ul>--}}
{{--</nav>--}}


<div class="page-body">

    @yield('page-body')

</div>
</div>
<script src="{{ asset('/js/vendor.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>

</body>




</html>
