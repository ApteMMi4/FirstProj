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

{{--        <div class="header-profile">--}}
{{--            <button class="profile-main__btn profile-hover">--}}
{{--                <div class="profile__inner">--}}
{{--                    <img class="profile__icon1" loading="lazy" src="img/avatar.svg" alt="">--}}
{{--                    <span class="profile__text">Mrvintage</span>--}}
{{--                    <img class="profile__icon2" loading="lazy" src="img/settings.png" alt="">--}}
{{--                </div>--}}
{{--            </button>--}}
{{--            <div class="profile__content">--}}
{{--                <a href="pc-profile.html" class="profile__btn profile-hover">--}}
{{--                    <img class="profile__icon3" loading="lazy" src="img/profile.png" alt="">--}}
{{--                    <span class="profile__btn-text profile__btn-text--one">Профиль</span>--}}
{{--                </a>--}}
{{--                <a href="password.html" class="profile__btn profile-hover">--}}
{{--                    <img class="profile__icon3" loading="lazy" src="img/password.png" alt="">--}}
{{--                    <span class="profile__btn-text">Изменить пароль</span>--}}
{{--                </a>--}}
{{--                <button class="profile__btn profile-hover">--}}
{{--                    <img class="profile__icon3" loading="lazy" src="img/exit.png" alt="">--}}
{{--                    <span class="profile__btn-text">Выйти</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

    </header>


{{--    <nav class="nav">--}}
{{--        <ul class="nav__list ">--}}
{{--            <li class="nav__item">--}}
{{--                <a href="personal-area.html" class="nav__link ">Статистика</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="pc-transactions.html" class="nav__link ">Транзакции</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <span class="nav__link nav__link--active">Выводы</span>--}}
{{--                <ul class="submenu">--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="output-create.html" class="submenu__link submenu__link--active">Создать</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="output.html" class="submenu__link ">История</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="payment.html" class="submenu__link ">Массовые выплаты</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="sample.html" class="submenu__link ">Шаблоны</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="discount.html" class="submenu__link @sublink5">Скидка</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="#" class="nav__link ">Api</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="https://docs.apipay.is" class="nav__link ">Документация</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="arbitrary-payment.html" class="nav__link @link6">Произвольный платеж</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="#" class="nav__link @link7">Новости</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <a class="nav__link nav__link--bottom" href="#">Техническая поддержка</a>--}}
{{--    </nav>--}}
</body>


    <div class="page-content">
        <section class="output-create">
            <h2 class="output-create__title title fz18">Вывод</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form class="page-content__box" action="/cabinet/conclusionsCreate" method="post">
                @csrf


                <div class="output-create__item">
                    Способ оплаты

                    <div class="select">

                        <div class="select__top">
                            @if(empty($trans->toArray()))
                                <span class="select__top-title">UAH (0)</span>
                            @endif
                            @foreach($trans as $item)
                                <span class="select__top-title">UAH ({{$item->sum('total')}})</span>
                            @endforeach
                        </div>

                        <div class="select__content">
                            <div class="select__input">
                                <input type="radio" name="valute" value="UAH" checked>
                                <span class="select__item">UAH</span>
                            </div>
                            <div class="select__input">
                                <input type="radio" name="valute" value="USD">
                                <span class="select__item">USD</span>
                            </div>
                            <div class="select__input">
                                <input type="radio" name="valute" value="USD">
                                <span class="select__item">USDT</span>
                            </div>
                            <div class="select__input">
                                <input type="radio" name="valute" value="ИЕС">
                                <span class="select__item">BTC</span>
                            </div>
                            <div class="select__input">
                                <input type="radio" name="valute" value="BTC">
                                <span class="select__item">ETH</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="output-create__item">
                    Cумма
                    <input class="payment__input output-create__input" name="sum" type="text">
                </div>
                <div class="output-create__item">
                    Куда вывести
                    <div class="output-create__item--wrap">
                        <div class="select">
                            <div class="select__top select__top-output">
                                <span class="select__top-title">Visa/Mc UAH</span>
                            </div>
                            <div class="select__content">
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="UAH" checked>
                                    <span class="select__item">Visa/Mc UAH</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="UAH">
                                    <span class="select__item">Kuna Code UAH</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="USD">
                                    <span class="select__item">USD</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="BTC">
                                    <span class="select__item">BTC</span>
                                </div>
                            </div>
                        </div>
                        <input class="input-output" type="text" name="return" required minlength="16" maxlength="16">
                    </div>
                </div>
{{--                <div class="output-create__item">--}}
{{--                     Получите с учетом комисии--}}
{{--                    <input class="payment__input output-create__input" name="commission" type="text">--}}
{{--                </div>--}}
               {{-- <div class="output-create__item">
                    Курс обмена
                    <input class="payment__input output-create__input" name="commission" type="text">
                </div>--}}
                <div class="output-create__btn--wrap">
                    <button class="output-create__btn gradi-btn btn-hover2">Создать заявку</button>
                </div>
            </form>
        </section>

    </div>

</div>

@endsection



