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
                    <span>Выводы</span>
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
                </button>
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
    <section class="payment-section">
        <div class="payment__text">
            <span class="payment__text-title">Платежи:</span>
            <span> {{auth()->user()->name}}</span>
            <span></span>
        </div>

            <form class="payment-box" >
                <div class="payment__top">
                    <div class="payment__top-center">
                        <div class="payment__list payment__titles">
                            <div class="payment__item payment__item1">Номер карты</div>
                            <div class="payment__item payment__item2">Сумма </div>
                            <div class="payment__item payment__item3">Примечание</div>
                        </div>



                        <div class="payment__list">
                            <input class="payment__input payment__item1" type="text">
                            <input class="payment__input payment__item2" type="text">
                            <input class="payment__input payment__item3" type="text">
                            <button class="payment__btn payment__btn--plus btn-hover"></button>
                            <!-- <button class="payment__btn payment__btn--minus btn-hover"></button> -->
                        </div>
                        <div class="payment__list">
                            <input class="payment__input payment__item1" type="text">
                            <input class="payment__input payment__item2" type="text">
                            <input class="payment__input payment__item3" type="text">
                            <button class="payment__btn payment__btn--plus btn-hover"></button>
                            <!-- <button class="payment__btn payment__btn--minus btn-hover"></button> -->
                        </div>
                        <div class="payment__list">
                            <input class="payment__input payment__item1" type="text">
                            <input class="payment__input payment__item2" type="text">
                            <input class="payment__input payment__item3" type="text">
                            <button class="payment__btn payment__btn--plus btn-hover"></button>
                        </div>
                    </div>
{{--                    <div class="payment__top-right">--}}
{{--                        <button class="payment__btn payment__btn--minus btn-hover"></button>--}}
{{--                    </div>--}}
                </div>


                         <input type="checkbox"><label>Сохранить карты получаетелей в шаблон</label>
                <div class="payment-box__btn">
                    <button class="payment__btn-big payment__btn--reset btn-hover2"
                            type="reset">Очистить</button>
                    <button class="payment__btn-big payment__btn--submit btn-hover2"
                            type="submit">Отправить</button>
                </div>
        </form>
    </section>
</div>
</body>
</div>
@endsection

