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
                    <span>Шаблоны</span>
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
    <section class="output-section">
        <div class="output__top">
            <div class="filter-wrapper">
                <span class="filter__text">Шаблоны</span>
                <button class="sample__btn-big btn-hover2">Добавить шаблон</button>
                <form class="search-block sample__form">
                    <div class="select-defolt">
                        <select>
                            <option value="">
                                ID
                            </option>
                            <option value="">
                                Название
                            </option>
                        </select>
                    </div>
                    <input class="sample__input sample__input-modern" type="text" placeholder="Значение...">
                    <button class="search-block__btn gradi-btn btn-hover2">Найти</button>
                </form>
            </div>
        </div>
        <div class="output__middle">
            <div class="list-wrapper">
                <div class="list list__titles">
                    <div class="list__item sample__item1 list__title">
                        ID
                    </div>
                    <div class="list__item sample__item2 list__title">
                        Название шаблона
                    </div>
                    <div class="list__item sample__item3 list__title">
                        Дата создания шаблона
                    </div>
                    <div class="list__item sample__item4 list__title">
                        Количество карт
                    </div>
                    <div class="list__item sample__item5  list__title">
                        Шаблон на сумму
                    </div>
                    <div class="list__item sample__item6 list__title">
                        Действие
                    </div>
                </div>
                <div class="list">
                    <div class="list__item sample__item1 ">
                        <span>14523</span>
                    </div>
                    <div class="list__item sample__item2 ">
                        <span>cvc</span>
                    </div>
                    <div class="list__item sample__item3 ">
                        <span>20.09.2021 18.00</span>
                    </div>
                    <div class="list__item sample__item4 ">
                        <span>2</span>
                    </div>
                    <div class="list__item sample__item5 ">
                        <span>14 500 руб.</span>
                    </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src={{asset("img/change.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src={{asset("img/exchange.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src={{asset("img/delete.png")}} alt="">
                        </button>
                        <script>
                            document.onclick = function() {
                                div = Array.from(document.querySelectorAll('.list'));
                                div.forEach((e) => {
                                    e.onclick = function() {
                                        this.remove();
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
                <div class="list">
                    <div class="list__item sample__item1 ">
                        <span>14523</span>
                    </div>
                    <div class="list__item sample__item2 ">
                        <span>cvc</span>
                    </div>
                    <div class="list__item sample__item3 ">
                        <span>20.09.2021 18.00</span>
                    </div>
                    <div class="list__item sample__item4 ">
                        <span>2</span>
                    </div>
                    <div class="list__item sample__item5 ">
                        <span>14 500 руб.</span>
                    </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src={{asset("img/change.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src={{asset("img/exchange.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src={{asset("img/delete.png")}} alt="">
                        </button>
                        <script>
                            document.onclick = function() {
                                div = Array.from(document.querySelectorAll('.list'));
                                div.forEach((e) => {
                                    e.onclick = function() {
                                        this.remove();
                                    }
                                });
                            }
                        </script>
                        </button>
                    </div>
                </div>
                <div class="list">
                    <div class="list__item sample__item1 ">
                        <span>14523</span>
                    </div>
                    <div class="list__item sample__item2 ">
                        <span>cvc</span>
                    </div>
                    <div class="list__item sample__item3 ">
                        <span>20.09.2021 18.00</span>
                    </div>
                    <div class="list__item sample__item4 ">
                        <span>2</span>
                    </div>
                    <div class="list__item sample__item5 ">
                        <span>14 500 руб.</span>
                    </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src={{asset("img/change.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src={{asset("img/exchange.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src={{asset("img/delete.png")}} alt="">
                        </button>
                        <script>
                            document.onclick = function() {
                                div = Array.from(document.querySelectorAll('.list'));
                                div.forEach((e) => {
                                    e.onclick = function() {
                                        this.remove();
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src="img/change.png" alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src="img/exchange.png" alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src="img/delete.png" alt="">
                        </button>
                    </div>
                </div>
            </div>
    </section>
        </div>



    </section>
    <div class="sample-popup sample-popup-change">
        <div class="sample-popup__inner">
            <div class="sample-popup__top">
                <p class="sample-popup__title">Редактировать шаблон</p>
                <button class="sample-popup__close sample-popup__close-change"></button>
            </div>
            <form class="sample-popup__bottom" action="/">
                <div class="sample-popup__box">
                    <div class="sample-popup__item sample-popup__item1">
                        Номер карты
                        <input class="payment__input sample-popup__input" name="number" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item2">
                        Сумма
                        <input class="payment__input sample-popup__input" name="sum" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item3">
                        Название
                        <input class="payment__input sample-popup__input" name="text" type="text">
                    </div>
                </div>
                <div class="payment-box__btn">
                    <button class="payment__btn-big payment__btn--reset btn-hover2"
                            type="reset">Очистить</button>
                    <button class="payment__btn-big payment__btn--submit btn-hover2"
                            type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
    <div class="sample-popup sample-popup-add">
        <div class="sample-popup__inner">
            <div class="sample-popup__top">
                <p class="sample-popup__title">Добавить шаблон</p>
                <button class="sample-popup__close sample-popup__close-add"></button>
            </div>
            <form class="sample-popup__bottom" action="/">
                <div class="sample-popup__box">
                    <div class="sample-popup__item sample-popup__item1">
                        Номер карты
                        <input class="payment__input sample-popup__input" name="number" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item2">
                        Сумма
                        <input class="payment__input sample-popup__input" name="sum" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item3">
                        Название
                        <input class="payment__input sample-popup__input" name="text" type="text">
                    </div>
                </div>
                <div class="payment-box__btn">
                    <button class="payment__btn-big payment__btn--reset btn-hover2"
                            type="reset">Очистить</button>
                    <button class="payment__btn-big payment__btn--submit btn-hover2"
                            type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="overley"></div>

</div>

</body>

@endsection

