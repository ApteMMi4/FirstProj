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
                <span>Профиль</span>
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


    {{--@section('page-body')--}}
    <div class="page-content">
        <section class="pc-profile">
            <div class="pc-profile__wrapper">
                <h2 class="pc-profile__title title fz18">Профиль</h2>
                <div class="pc-profile__info">
                   <b> Ваш оборот </b>
                    @if(empty($trans->toArray()))
                        <span class="pc-profile__sum">0.00 UAH</span>
                    @else
                        @foreach($trans as $currency=>$item)

                            <span class="pc-profile__sum">{{$item->sum('total')}} {{$currency}}</span>
                        @endforeach

                    @endif
{{--                    <br>--}}
{{--                    ваша скидка--}}
{{--                    <span class="pc-profile__precent gradi-btn">0,0%</span>--}}
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="pc-profile__form" method="POST" action="{{route('profile_update')}}">
                @csrf
                @method('PUT')
                <div class="pc-profile__group">
                    <span style="display: inline-block; width: 20%;">ID</span>
                    <input class="payment__input pc-profile__input" style="display: inline-block; width: 75%;" value="{{$user->name}}" type="text" disabled>
                    <input value="{{$user->id}}" name="id" type="hidden">
                </div>

                <div class="pc-profile__group">
                    <span style="display: inline-block; width: 20%;">Email</span>
                    <input class="payment__input pc-profile__input" style="display: inline-block; width: 75%;"  value="{{$user->email}}" type="text" disabled>
                </div>

            </form>



            <section class="pc-profile verify">
                <div class="pc-profile__wrapper">
                    <h2 class="pc-profile__title title fz18">Статус профиля</h2>
                </div>
                <div class="pc-profile__form">
                    <div class="flex">
                        <img src="{{ asset('img/voskl.svg')}}" alt="img">
                        Верифицируйте свой профиль
                    </div>
                    <button class="pc-profile__btn gradi-btn btn-hover2">Начать</button>

                </div>
            </section>


            <div class="token__wrapper">

            </div>
        </section>
    </div>
    <div class="pc-profile__group">
        @if(!$user->twofagoogle)
            <p>Пароль 2FA</p>
            <input class="payment__input pc-profile__input"  name="google2fa_pass" placeholder="Пароль 2FA" type="password">

        @endif

    </div>
    <button type="submit" class="pc-profile__btn gradi-btn btn-hover2">@if($user->twofagoogle) Выключить @else Включить @endif</button>
    </form>




    </section>
    </div>
{{--@endsection--}}

</div>
<script src="js/vendor.js"></script>
<script src="js/main.js"></script>
</body>

{{--<nav class="nav">--}}
{{--    <ul class="nav__list">--}}
{{--{--}}


{{--        @if(auth()->user()->isAdmin())--}}
{{--            @include('profile.__parts.leftNavigation')--}}
{{--        @endif--}}

{{--</nav>--}}


<div class="page-body">

    @yield('page-body')

</div>
</div>
<script src="{{ asset('/js/vendor.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>

</body>




</html>
