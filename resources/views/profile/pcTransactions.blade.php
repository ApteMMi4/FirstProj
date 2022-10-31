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

        <div class="header-admin__static">
            <div class="header-title">
                <span>Профиль</span>
                <span></span>
            </div>




        <div class="page-content">
            <section class="currencies admin-trans pc-trans">
                <div class="currencies__wrapper">
                    <div class="currencies__top">
                    </div>
                    <div class="admin-trans__wrap">
                        <div class="admin-trans__filter">
                            <div class="select-defolt">
                                <select>
                                    <option value="">
                                        ID
                                    </option>
                                    <option value="">
                                        Реквизиты
                                    </option>

                                </select>
                            </div>
                            <form class="search-block">
                                <input type="text" placeholder="Значения">
                                <button class="search-block__btn gradi-btn">Найти</button>
                            </form>
                            <div class="select-defolt all-type">
                                <select>
                                    <option value="">
                                        Easypay
                                    </option>
                                    <option value="">
                                        Global24
                                    </option>
                                    <option value="">
                                        Cash-in
                                    </option>
                                    <option value="">
                                        Visa/Mc
                                    </option>
                                    <option value="">
                                        Kuna
                                    </option>
                                    <option value="">
                                        BTC
                                    </option>
                                    <option value="">
                                        USDT
                                    </option>
                                    <option value="">
                                        ETH
                                    </option>
                                    <option value="">
                                        LTC
                                    </option>
                                    <option value="">
                                        XRP
                                    </option>
                                    <option value="">
                                        TRX
                                    </option>
                                </select>
                            </div>
                            <div class="select-defolt cancellation">
                                <select>
                                    <option value="">
                                        Завершен
                                    </option>
                                    <option value="">
                                        Отменен
                                    </option>
                                    <option value="">
                                        Приостановлен
                                    </option>
                                </select>
                            </div>
                        </div>
                        <form class="filter-wrapper" action="/">
                            <span class="filter__text">На странице:</span>
                            <div class="select-defolt cancellation">
                                <select>
                                    <option value="">
                                        10
                                    </option>
                                    <option value="">
                                        20
                                    </option>
                                    <option value="">
                                        30
                                    </option>
                                    <option value="">
                                        40
                                    </option>
                                    <option value="">
                                        50
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="admin-table user__table">
                        <div class="admin-table__row row-title">
                            <div class="admin-table__first">
                                ID
                            </div>
                            <div class="admin-table__two">
                                Дата
                            </div>

                            <div class="admin-table__three">
                                Реквизиты
                            </div>
                            <div class="admin-table__five">
                                ПС
                            </div>
                            <div class="admin-table__six">
                                Сумма
                            </div>
                            <div class="admin-table__seven">
                                Сумма мерчанта
                            </div>
                            <div class="admin-table__eight">
                                Сумма клиента
                            </div>
                            <div class="admin-table__nine">
                                Статус
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                        <div class="admin-table__row">
                            <div class="admin-table__first">
                                14523
                            </div>
                            <div class="admin-table__two">
                                18.08.2021
                            </div>

                            <div class="admin-table__three">
                                1BQ9qza7fn9snSCyJQB3ZcN46biBtkt4ee
                            </div>
                            <div class="admin-table__five">
                                -
                            </div>
                            <div class="admin-table__six">
                                15 050 руб.
                            </div>
                            <div class="admin-table__seven">
                                550 руб.
                            </div>
                            <div class="admin-table__eight">
                                14 500 руб.
                            </div>
                            <div class="admin-table__nine green-text">
                                Оплачен
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <ul class="pagination">
                <li class="pagination__item active">
                    <span class="pagination__link">1</span>
                </li>
                <li class="pagination__item btn-hover3">
                    <a class="pagination__link" href="#">2</a>
                </li>
                <li class="pagination__item btn-hover3">
                    <a class="pagination__link" href="#">3</a>
                </li>
                <li class="pagination__item btn-hover3">
                    <a class="pagination__link" href="#">4</a>
                </li>
                <li class="pagination__item btn-hover3">
                    <a class="pagination__link" href="#">5</a>
                </li>
                <li class="pagination__item btn-hover3">
                    <a class="pagination__link" href="#">6</a>
                </li>
            </ul>
        </div>

        <div class="overley"></div>

    </div>
@endsection
