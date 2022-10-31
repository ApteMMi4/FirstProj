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
                <span>Paycodes - Редактирование</span>
                <span></span>
                <span></span>
            </div>
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
                <a href="{{ route('profile_me') }}" class="profile__btn profile-hover">
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
@section('page-body')
    @if (Auth::user()->role == 'admin')

    <div class="page-content">
        <section class="currencies user-page-v2">
            <div class="currencies__wrapper">
                <div class="currencies__top">
                    <h2 class="user-page__title title fz18">
                        Paycodes - Редактирование

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
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

                    </h2>

                </div>

                <section class="pay-code api" style="background:#ffffff; box-sizing: border-box; padding: 1rem; max-width: 400px">

                  <form action="{{route('paycode::update')}}" method="POST" id="data-form" enctype="multipart/form-data" class="pc-profile__form">
                  <input type="hidden" value="{{$paycode->id}}" name="id">
                  @method('PUT')
                  @csrf

                    <div class="pc-profile__group">
                      <p>Пользователь - отправитель кода</p>
                      <select class="payment__input pc-profile__input" name="user_id_from">
                        @foreach($clients as $client)
                        <option value="{{$client->id}}" @if($paycode->user_id_from == $client->id) selected @endif >{{$client->email}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="pc-profile__group">
                      <p>Пользователь - получатель кода</p>
                      <select class="payment__input pc-profile__input" name="user_id_to">
                        <option value="0" selected>Не выбран</option>
                        @foreach($clients as $client)
                        <option value="{{$client->id}}" @if($paycode->user_id_to == $client->id) selected @endif >{{$client->email}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="pc-profile__group">
                      <p>Валюта</p>
                      <select class="payment__input pc-profile__input" name="paycode_currency">
                        <option value="UAH" @if($paycode->paycode_currency == 'UAH') selected @endif>UAH</option>
                        <option value="USD" @if($paycode->paycode_currency == 'USD') selected @endif>USD</option>
                        <option value="EUR" @if($paycode->paycode_currency == 'EUR') selected @endif>EUR</option>
                        <option value="RUB" @if($paycode->paycode_currency == 'RUB') selected @endif>RUB</option>
                      </select>
                    </div>

                    <div class="pc-profile__group">
                      <p>Сумма кода</p>
                      <input type="number" required name="paycode_amount" class="payment__input pc-profile__input" placeholder="" step="any" value="{{price_format($paycode->paycode_amount)}}">
                    </div>

                    <div class="pc-profile__group">
                      <p>Код - выдаётся клиенту</p>
                      <input type="text" name="paycode_id" disabled class="payment__input pc-profile__input" placeholder="" value="{{$paycode->paycode_id}}">
                    </div>

                    <div class="pc-profile__group">
                      <p>Статус</p>
                      <select class="payment__input pc-profile__input" name="status">
                        <option value="0" @if($paycode->paycode_currency == 0) selected @endif>Не погашен</option>
                        <option value="1" @if($paycode->paycode_currency == 1) selected @endif>Погашен</option>
                        <option value="2" @if($paycode->paycode_currency == 2) selected @endif>Заблокирован</option>
                        <option value="3" @if($paycode->paycode_currency == 3) selected @endif>Удалён</option>
                      </select>
                    </div>

                    <div class="pc-profile__group">
                      <button type="submit" class="pc-profile__btn gradi-btn btn-hover2">Сохранить</button>
                    </div>


                  </form>

                </section>

            </div>


        </section>




    </div>
    @elseif(Auth::user()->role == 'user')

        <echo>Вы не являетесь администратором для просмотра этой страницы!!!</echo>

    @endif

@endsection

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
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>




</html>
