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


    <link rel="stylesheet" href=" {{asset('frontend/css/vendor.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/main.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/custom/custom.css')}}?ver=9 ">

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



    <div class="page-content">
        @if (Auth::user()->role == 'admin')
        <section class="currencies user-page-v2">
            <div class="currencies__wrapper">
                <div class="currencies__top">
                    <h2 class="user-page__title title fz18">
                        Paycodes

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
                        <a href="{{route('paycode::create')}}" class="gradi-btn btn-hover2 padding-btn">
                          Создать код
                        </a>
                    </h2>
                    <form>

                      <div class="filter-form">

                        <div class="filter-form-item">
                          <p>Номер кода</p>
                          <input type="text" name="paycode_search" value="@if(isset($_GET['paycode_search'])){{$_GET['paycode_search']}}@endif">
                        </div>

                        <div class="filter-form-item">
                          <p>Создатель кода</p>
                          <select class="" name="user_id_search">
                            <option value="0" @if(isset($_GET['user_id_search']) && $_GET['user_id_search'] == 0) selected @endif>Не выбран</option>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}" @if(isset($_GET['user_id_search']) && $_GET['user_id_search'] == $client->id) selected @endif>{{$client->email}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="filter-form-item">
                          <p>Получатель кода</p>
                          <select class="" name="user_id_search2">
                            <option value="0" @if(isset($_GET['user_id_search2']) && $_GET['user_id_search2'] == 0) selected @endif>Не выбран</option>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}" @if(isset($_GET['user_id_search2']) && $_GET['user_id_search2'] == $client->id) selected @endif>{{$client->email}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="filter-or"> или </div>
                        <div class="filter-form-item">
                          <p>Никнейм</p>
                          <input type="text" name="paycode_email_custom" value="@if(isset($_GET['paycode_email_custom'])){{$_GET['paycode_email_custom']}}@endif">
                        </div>

                        <div class="filter-form-item">
                          <input type="submit" class="gradi-btn btn-hover2 btn-pad-mini" value="Найти код">
                        </div>
{{--                        <div class="filter-form-item">--}}
{{--                          <a href="{{route('paycode::index.get')}}" class="gradi-btn btn-hover2 btn-pad-mini">Сбросить фильтр</a>--}}
{{--                        </div>--}}

                      </div>







                    </form>



                </div>
                <div class="admin-table user__table">
                    <div class="admin-table__row row-title">
                        <div class="admin-table__first">
                            ID
                        </div>
                        <div class="admin-table__two">
                            User From
                        </div>
                        <div class="admin-table__two">
                            User To
                        </div>
                        <div class="admin-table__three">
                            Валюта
                        </div>
                        <div class="admin-table__four">
                            Сумма
                        </div>
                        <div class="admin-table__five">
                            Статус
                        </div>
                        <div class="admin-table__five">
                        </div>
                    </div>

                    @foreach($paycodes as $paycode)
                    <div class="admin-table__row">
                        <div class="admin-table__first">
                            {{$paycode->id}}
                        </div>

                        <div class="admin-table__two">
                          @if(isset($paycode->user_from))
                            {{$paycode->user_from->email}}
                          @endif
                        </div>

                        <div class="admin-table__two">
                          @if(isset($paycode->user_to))
                            {{$paycode->user_to->email}}
                          @else
                            Без привязки
                          @endif
                        </div>

                        <div class="admin-table__three">
                          {{$paycode->paycode_currency}}
                        </div>
                        <div class="admin-table__four">
                          {{price_format($paycode->paycode_amount)}}
                        </div>

                        <div class="admin-table__five">
                            @if($paycode->status == 0)
                            <span style="color: #ffc107;">Непогашен</span>
                            @endif
                            @if($paycode->status == 1)
                            <span style="color: #64af32;">Погашен</span>
                            @endif
                            @if($paycode->status == 2)
                            <span style="color: #f44336;">Заблокирован</span>
                            @endif
                            @if($paycode->status == 3)
                            <span style="color: #f44336;">Удалён</span>
                            @endif
                        </div>

                        <div class="admin-table__five">
                          <a href="{{route('paycode::edit', ['id' => $paycode->id])}}">
                            Редактировать
                          </a>
                        </div>


                    </div>
                    @endforeach

                </div>
            </div>


        </section>

        {{ $paycodes->links('vendor.pagination.custom') }}


    </div>
    @elseif(Auth::user()->role == 'user')

        <echo>Вы не являетесь администратором для просмотра этой страницы!!!</echo>

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



</div>

<script src="{{asset('frontend/custom/custom.js')}}?ver=10"></script>

</body>




</html>
