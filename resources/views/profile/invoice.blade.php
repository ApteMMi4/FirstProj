
@extends('frontend/layouts/base')

@section('content')



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
                    <span>Статистика</span>
                    <span></span>
                </div>
            </div>
            <div class="header-profile">
                <div class="hero__pay-cur-outer pay-cur-outer">
                    <div class="pay-cur">
                        <img src="{{asset('frontend/img/lang.svg')}}" alt="img">
                        <span class="pay-cur-span lang">укр.</span>
                        <img src="{{asset('frontend/img/arrow-down.svg')}}" alt="img">
                    </div>
                    <ul class="pay-cur-list lang-list">
                        <li class="lang-item">
                            укр.
                        </li>
                        <li class="lang-item">
                            рус.
                        </li>
                    </ul>
                </div>
                <div class="profile-main__btn profile-hover">
                    <div class="profile__inner">
                        <img class="profile__icon1" loading="lazy" src={{asset("img/avatar.svg")}} alt="">
                        <span class="profile__text">{{ Auth::user()->name }}</span>
                        <img class="profile__icon2" loading="lazy" src={{asset("img/settings.png")}} alt="">
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




        <div class="page-content">
        <section class="arbitrary-payment">
            <h2 class="arbitrary-payment__title title fz18">Создать произвольный платеж</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="arbitrary-payment__form" action="{{route('profile_arbitraryPaymentSave')}}" method="POST" >
                @csrf
                <div class="arbitrary-payment__item arbitrary-payment__item1">
                    Сумма платежа
                    <input class="payment__input arbitrary-payment__input" name="payment" type="text">
                </div>
                <div class="arbitrary-payment__item">
                    Выбор сервиса
{{--                    <div class="select arbitrary-payment__select">--}}
{{--                        <div class="select__top">--}}
{{--                            <img class="select__top-icon" src="" alt="">--}}
{{--                            <span class="select__top-title">Выберите сервис</span>--}}
{{--                        </div>--}}
{{--                        <div class="select__content">--}}
{{--                            @foreach($listPay as $id=>$name)--}}
{{--                            <div class="select__input">--}}
{{--                                <input type="radio" value="{{$id}}" name="listpay">--}}
{{--                                <span class="select__item">Card UAH</span>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="select-defolt all-type">
                        <select name="listpay">
                            @foreach($listPay as $id=>$name)
                            <option value="{{$id}}">
                                Card UAH
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="arbitrary-payment__btn gradi-btn btn-hover2" onclick="">Получить ссылку</button>
            </form>
            <div class="list-wrapper">
                <div class="list list__titles">
                    <div class="list__item arbitrary-payment__list1 list__title">
                        ID
                    </div>
                    <div class="list__item arbitrary-payment__list2 list__title">
                        Дата
                    </div>
{{--                    <div class="list__item arbitrary-payment__list3 list__title">--}}
{{--                        Логин--}}
{{--                    </div>--}}
                    <div class="list__item arbitrary-payment__list4 list__title">
                        Ссылка
                    </div>
                    <div class="list__item arbitrary-payment__list5 list__title">
                        Сумма
                    </div>
                    <div class="list__item arbitrary-payment__list6 list__title">
                        Статус
                    </div>
                </div>
                @foreach($paymList as $iten)
                <div class="list">
                    <div class="list__item arbitrary-payment__list1">
                        <span>{{$iten->id}}</span>
                    </div>
                    <div class="list__item arbitrary-payment__list2">
                        <span>{{$iten->created_at}}</span>
                    </div>
{{--                    <div class="list__item arbitrary-payment__list3">--}}
{{--                        <span>{{$iten->name}}</span>--}}
{{--                    </div>--}}
                    <div class="list__item arbitrary-payment__list4">
                        @if($iten->blocked == 1)
                            @if(!is_null($iten->transaction_id))
                            <a href="{{$iten->url}}" target="_blank"> Транзакция заблокирована</a>
                            @else
                                <a href="#" target="_blank"> Не обработанная</a>
                            @endif
                        @else
                            @if($iten->status==1)
                                <a href="{{$iten->url}}" target="_blank"> Оплачен</a>
                            @else
                            <a href="{{$iten->url}}" target="_blank"> Ссылка для оплаты</a>
                            @endif
                        @endif

                    </div>
                    <div class="list__item arbitrary-payment__list5">
                        <span>{{$iten->sum}} UAH</span>
                    </div>
                    <div class="list__item arbitrary-payment__list6">
                        <span class="list__status">
                            @if($iten->status==0) <font color="black">Не оплачен</font>
                            @elseif($iten->blocked==1)<font color="red">Отклонен</font> @else Оплачен @endif</span>
                    </div>
                </div>
                @endforeach

            </div>
        </section>
{{--        <div class="pagination"> {{ $paymList->links() }}</div>--}}
    </div>
@endsection
