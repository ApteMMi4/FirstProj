@include('frontend/partials/head')

    <div class="page">
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <a class="header__logo" href="{{ route('index') }}">
                        <img class="header__icon" src="img/logo.png" alt="">
                        24Pay.Io
                    </a>
                    <nav class="header__nav">
                        <ul class="header__nav-list">
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="{{route('footerMenu_aboutUs')}}">О нас </a>
                            </li>
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="{{route('footerMenu_newses')}}">Новости</a>
                            </li>
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="{{route('footerMenu_contacts')}}">Контакты</a>
                            </li>
                        </ul>
                        @if(!auth()->user())
                        <button class="main__btn main__btn--header">Авторизация</button>
                        @elseif(auth()->user()->isUser())
                        <button class="main__btn  popup__btn">
                            <a class="header__nav-link" href="{{ route('login') }}">Кабинет</a>
                        </button>
                        @endif
                    </nav>
                    <div class="burger burger--main">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

        </header>



        <section class="hero">
            <div class="container">
                <div class="hero__inner">
                    <div class="hero__pay pay">
                        <div class="hero__pay-head pay-head">
                            <div class="header__logo">
                                <img class="header__icon" src="img/logo.png" alt="img">
                            </div>
                            <h4 class="hero__pay-title pay-title">Пополнить аккаунт</h4>
                        </div>
                        <label class="hero__pay-input-outer pay-input-outer">
                            <span class="hero__pay-input-sup pay-input-sup">ID пользователя</span>
                            <input class="hero__pay-input pay-input popup__input" type="text">
                            <span class="hero__pay-input-sub pay-input-sub">Введите уникальный ID пользователя</span>
                        </label>
                        <label class="hero__pay-input-outer pay-input-outer">
                            <span class="hero__pay-input-sup pay-input-sup">Email</span>
                            <input class="hero__pay-input pay-input popup__input" type="text">
                            <span class="hero__pay-input-sub pay-input-sub">Введите e-mail для получения
                                24Pay-Code</span>
                        </label>
                        <label class="hero__pay-input-outer pay-input-outer">
                            <span class="hero__pay-input-sup pay-input-sup">Сумма</span>
                            <div class="flex">
                                <input class="hero__pay-input pay-input pay-input-c popup__input" type="number"
                                    placeholder="0.00">
                                <div class="hero__pay-cur-outer pay-cur-outer">
                                    <div class="pay-cur">
                                        <span class="pay-cur-span">грн.</span>
                                        <img src="img/arrow-down.svg" alt="img">
                                    </div>
                                    <ul class="pay-cur-list">
                                        <li class="pay-cur-list-item">
                                            грн.
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <label class="checkbox-block authorization-checkbox">
                                <input class="checkbox " type="checkbox">
                                <a href="agreement" class="checkbox__text">
                                    Принимаю Пользовательское соглашение</a>

                            </label>
                        </label>
                        <button class="hero__pay-btn pay-btn main__btn">
                            Пополнить
                        </button>
                    </div>
                    <div class="hero__pay pay">
                        <div class="hero__pay-head pay-head">
                            <div class="header__logo">
                                <img class="header__icon" src="img/logo.png" alt="img">
                            </div>
                            <h4 class="hero__pay-title pay-title">24Pay-Code</h4>
                        </div>
                        <label class="hero__pay-input-outer pay-input-outer">
                            <span class="hero__pay-input-sup pay-input-sup">Email</span>
                            <input class="hero__pay-input pay-input popup__input" type="text">
                            <span class="hero__pay-input-sub pay-input-sub">Введите e-mail для получения
                                24Pay-Code</span>
                        </label>
                        <label class="hero__pay-input-outer pay-input-outer">
                            <span class="hero__pay-input-sup pay-input-sup">Сумма</span>
                            <div class="flex">
                                <input class="hero__pay-input pay-input pay-input-c popup__input" type="number"
                                    placeholder="0.00">
                                <div class="hero__pay-cur-outer pay-cur-outer">
                                    <div class="pay-cur">
                                        <span class="pay-cur-span">грн.</span>
                                        <img src="img/arrow-down.svg" alt="img">
                                    </div>
                                    <ul class="pay-cur-list">
                                        <li class="pay-cur-list-item">
                                            грн.
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <label class="checkbox-block authorization-checkbox">
                                <input class="checkbox " type="checkbox">
                                <a href="agreement" class="checkbox__text">
                                    Принимаю Пользовательское соглашение</a>
                            </label>
                        </label>
                        <button class="hero__pay-btn pay-btn main__btn">
                            Купить
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits">
            <div class="container">
                <div class="benefits__inner">
                    <h2 class="benefits__title title-main fz27">Наши преимущества</h2>
                    <ul class="benefits__list">
                        <li class="benefits__item">
                            <img class="benefits__num" src="img/online-exchange.svg" alt="#">
                            <div class="benefits__info">
                                <p class="benefits__info-title">Автоматический обмен</p>
                                <p class="benefits__info-text">Обмен криптовалюты и фиатной валюты с выставлением курса
                                    (рыночный и лимитный ордер). </p>
                            </div>
                        </li>
                        <li class="benefits__item">
                            <img class="benefits__num" src="img/withdrawal.svg" alt="#">
                            <div class="benefits__info">
                                <p class="benefits__info-title">Платежная платформа</p>
                                <p class="benefits__info-text">Мультивалютная платформа поддерживающая фиатные и
                                    криптовалюты</p>
                            </div>
                        </li>
                        <li class="benefits__item">
                            <img class="benefits__num" src="img/payment.svg" alt="#">
                            <div class="benefits__info">
                                <p class="benefits__info-title">Оплата счетов</p>
                                <p class="benefits__info-text">Оплата в один клик. Выставление счетов для оплаты,
                                    криптовалютой, банковской картой, внутренним переводом 24PAY</p>
                            </div>
                        </li>
                        <li class="benefits__item">
                            <img class="benefits__num" src="img/protect.svg" alt="#">
                            <div class="benefits__info">
                                <p class="benefits__info-title">Хранение средств</p>
                                <p class="benefits__info-text">Надежное хранение ваших средств обеспечивает сертификат
                                    безопасности SSL-256 битным шифрованием </p>
                            </div>
                        </li>
                    </ul>
                    <button class="main__btn main__btn--logo">
                        <img class="main__btn-arrow-left" src="img/arrow.png" alt="">
                        подключиться
                        <img class="main__btn-arrow-right" src="img/arrow.png" alt="">
                    </button>
                </div>
            </div>
        </section>

        <section class="partners">
            <div class="container">
                <div class="partners__inner">
                    <h2 class="partners__title title-main fz27">Наши партнеры</h2>

                    <ul class="partners__list">
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/Bitcoin.svg.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/tether-logo.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/Ethereum_logo.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/tron-trx-logo.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/litecoin-ltc-logo.png" alt="">
                            </a>

                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/xrp.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/logo.svg" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/easypay.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/partners.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/partners.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/partners.png" alt="">
                            </a>
                        </li>
                        <li class="partners__item">
                            <a href="#">
                                <img src="img/partners.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="accounts">
            <h3 class="hidden-title">h3</h3>
            <div class="container">
                <div class="accounts__inner">
                    <div class="accounts__tab">
                        <div class="accounts__tab-btn-outer">
                            <button class="accounts__tab-btn" data-acc-tab="#accs-1">
                                Для частных лиц
                            </button>
                            <button class="accounts__tab-btn accs-btn-2" data-acc-tab="#accs-2">
                                Для бизнеса
                            </button>
                        </div>
                        <div class="accounts__tab-content-outer">
                            <div class="accounts__tab-content" id="accs-1">
                                <div class="accounts__card-outer">
                                    <div class="accounts__card">
                                        <div class="accounts__img-outer">
                                            <img src="img/online-exchange.svg" alt="img">
                                        </div>
                                        <h4 class="accounts__card-title">
                                            Онлайн обмен 24/7
                                        </h4>
                                        <p class="accounts__card-text">
                                            Покупка/продажа валюты и криптовалюты 24/7

                                        </p>
                                    </div>
                                    <div class="accounts__card">
                                        <div class="accounts__img-outer">
                                            <img src="img/withdrawal.svg" alt="img">
                                        </div>
                                        <h4 class="accounts__card-title">
                                            Вывод на карту
                                        </h4>
                                        <p class="accounts__card-text">
                                            Переводы средств на карты всех банков. Удобный интерфейс и история платежей.

                                        </p>
                                    </div>
                                    <div class="accounts__card">
                                        <div class="accounts__img-outer">
                                            <img src="img/transfers.svg" alt="img">
                                        </div>
                                        <h4 class="accounts__card-title">
                                            Перевод внутри платформы
                                        </h4>
                                        <p class="accounts__card-text">
                                            Мгновенные переводы между пользователями платформы без комиссии для всех
                                            валют
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accounts__tab-content" id="accs-2">
                                <div class="accounts__card-outer">
                                    <div class="accounts__card">
                                        <div class="accounts__img-outer">
                                            <img src="img/codepen.svg" alt="img">
                                        </div>
                                        <h4 class="accounts__card-title">
                                            Прием платежей
                                        </h4>
                                        <p class="accounts__card-text">
                                            Прием/выплата гривны. Криптопроцессинг USDT TRC 20, ETH, TRX.
                                            Автоконвертация
                                        </p>
                                    </div>
                                    <div class="accounts__card">
                                        <div class="accounts__img-outer">
                                            <img src="img/payment.svg" alt="img">
                                        </div>
                                        <h4 class="accounts__card-title">
                                            Выставление счетов
                                        </h4>
                                        <p class="accounts__card-text">
                                            Выставление счетов клиентам на Email, Telegram как в фиат так и в
                                            криптовалюте.
                                        </p>
                                    </div>
                                    <div class="accounts__card">
                                        <div class="accounts__img-outer">
                                            <img src="img/sign-in.svg" alt="img">
                                        </div>
                                        <h4 class="accounts__card-title">
                                            Открытое API
                                        </h4>
                                        <p class="accounts__card-text">
                                            Интегрируйте нашу платформу в свой проект. Удобное API. Техническая
                                            поддержка бизнес клиентов
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="invoicing">
            <div class="container">
                <div class="invoicing__inner">
                    <h3 class="invoicing__title title-main fz27">
                        Выставление счета
                    </h3>
                    <div class="invoicing__info-pay">
                        <div class="invoicing__info">
                            <div class="invoicing__info-block">
                                <div class="invoicing__img-outer">
                                    <img src="img/profitble.svg" alt="img">
                                </div>
                                <div class="invoicing__info-text">
                                    <h5 class="invoicing__info-title">Оплата счетов в криптовалютах</h5>
                                    <p class="invoicing__info-text">Прием платежей в USDT TRC20, ETH, TRX.</p>
                                </div>
                            </div>
                            <div class="invoicing__info-block">
                                <div class="invoicing__img-outer">
                                    <img src="img/uah.svg" alt="img">
                                </div>
                                <div class="invoicing__info-text">
                                    <h5 class="invoicing__info-title">Оплата счетов в фиате</h5>
                                    <p class="invoicing__info-text">Прием платежей любой банковской картой Украины</p>
                                </div>
                            </div>
                            <div class="invoicing__info-block">
                                <div class="invoicing__img-outer">
                                    <img src="img/infinity.svg" alt="img">
                                </div>
                                <div class="invoicing__info-text">
                                    <h5 class="invoicing__info-title">Неограниченное выставление счетов</h5>
                                    <p class="invoicing__info-text">Выставляйте счета клиентам без ограничений! Только
                                        для зарегистрированных пользователей.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="invoicing__pay pay">
                            <div class="exchange__inner main-payment">
                                <div class="main-payment__top doubled-title">
                                    <h2 class="title">Оплата счета <span>ID:№ 79856</span></h2>
                                </div>
                                <form class="main-payment__box main-payment__box2" action="/">
                                    <div class="payment-amount">Сумма платежа: <span class="payment-amount__sum">100
                                            USD</span>
                                    </div>
                                    <button onclick="use_online_pay('form_pay_system3','amount');"
                                        class=" main-payment__btn main-payment__btn2 gradi-btn btn-hover2 ">
                                        Оплатить
                                    </button>

                                </form>
                                <div class="main-payment__bottom">
                                    <div class="main-payment__line">
                                        <span class="main-payment__line-red custom-progress-bar"
                                            id="progress-bar-exchange-timer"></span>
                                    </div>
                                    <div class="main-payment__info">
                                        У вас есть <span class="main-payment__info-red" id="spanTimer"> 15:45 </span>
                                        для оплаты
                                        счета
                                    </div>
                                    <div class="main-payment__info main-payment__info--two">
                                        Статус счета: <img class="main-payment__info-img custom-animation--rotate"
                                            src="img/circle.png" alt=""> <span class="main-payment__info-red">не
                                            оплачен</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="profitble">
            <div class="container">
                <div class="profitble__inner">
                    <h3 class="profitble__title title-main fz27">
                        Выгодные комиссии
                    </h3>
                    <div class="profitble__card-outer">
                        <div class="profitble__card">
                            <div class="profitble__card-img-outer">
                                <img src="img/uah.svg" alt="img">
                            </div>
                            <h5 class="profitble__card-title">
                                Комиссии в гривне
                            </h5>
                            <div class="profitble__card-info">
                                <p class="profitble__card-text">
                                    3 % + 5 грн<br>
                                    пополнение гривны
                                </p>
                                <p class="profitble__card-text">
                                    2 %<br>
                                    вывод гривны
                                </p>
                            </div>
                        </div>
                        <div class="profitble__card">
                            <div class="profitble__card-img-outer">
                                <img src="img/limit.svg" alt="img">
                            </div>
                            <h5 class="profitble__card-title">
                                Лимиты транзакций в гривне
                            </h5>
                            <div class="profitble__card-info">
                                <p class="profitble__card-text">
                                    от 100 до 14000 грн<br>
                                    за транзакцию
                                </p>
                                <p class="profitble__card-text">
                                    * повышенные лимиты для бизнес аккаунтов
                                </p>
                            </div>
                        </div>
                        <div class="profitble__card">
                            <div class="profitble__card-img-outer">
                                <img src="img/profitble.svg" alt="img">
                            </div>
                            <h5 class="profitble__card-title">
                                Комиссии в криптовалютах
                            </h5>
                            <div class="profitble__card-info">
                                <p class="profitble__card-text">
                                    2,5% пополнение в USDT TRC 20, ETH, TRX
                                </p>
                                <p class="profitble__card-text">
                                    0% на отправку,только комиссия сети!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.templates.auth.registration_popup')
        @include('frontend.templates.auth.login_popup')

        <div class="popup popup--password">
            <form class="popup__inner" action="/">
                <span class="popup__close popup__close--password"></span>
                <h2 class="popup__title title-main fz27">Изменить пароль</h2>
                <p class="popup__text">Новый пароль</p>
                <div class="popup__wrapper">
                    <img class="popup__img" src="img/lock.png" alt="img">
                    <input class="popup__input popup__input--password payment__input" name="login" type="text">
                </div>
                <p class="popup__text">Новый пароль повторно</p>
                <div class="popup__wrapper">
                    <img class="popup__img" src="img/lock.png" alt="img">
                    <input class="popup__input popup__input--password payment__input" name="password" type="password">
                </div>
                <button class="main__btn main__btn--password popup__btn">Изменить</button>
            </form>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="footer__inner">
                    <div class="footer__info">


                    </div>
                    <div class="footer__menu-wrapper">
                        <nav class="footer__menu-outer">
                            <h4 class="footer__menu-title">
                                Продукты
                            </h4>
                            <ul class="footer__menu">
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_payKode24')}}" class="footer__menu-link">
                                        24Pay-Code
                                    </a>
                                </li>
                                <li class="footer__menu-item no-social">
                                    <a href="doc" class="footer__menu-link">
                                        API
                                    </a>
                                </li>
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_fees')}}" class="footer__menu-link">
                                        Комиссии
                                    </a>
                                </li>
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_invoices')}}" class="footer__menu-link">
                                        Invoice
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="footer__menu-outer">
                            <h4 class="footer__menu-title">
                                Информация
                            </h4>
                            <ul class="footer__menu">
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_fAQ')}}" class="footer__menu-link">
                                        FAQ
                                    </a>
                                </li>
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_blog')}}" class="footer__menu-link">
                                        Блог
                                    </a>
                                </li>
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_partners')}}" class="footer__menu-link">
                                        Партнерам
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="footer__menu-outer">
                            <h4 class="footer__menu-title">
                                Документация
                            </h4>
                            <ul class="footer__menu">
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_agreement')}}" class="footer__menu-link">
                                        Пользовательское соглашение
                                    </a>
                                </li>
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_privacyPolicy')}}" class="footer__menu-link">
                                        Политика конфиденциальности
                                    </a>
                                </li>
                                <li class="footer__menu-item no-social">
                                    <a href="{{route('footerMenu_amlKYCPolicy')}}" class="footer__menu-link">
                                        Политика AML/KYC
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="footer__menu-outer">
                            <h4 class="footer__menu-title">
                                Контакты
                            </h4>
                            <ul class="footer__menu">
                                <li class="footer__menu-item">
                                    <a href="#" class="footer__menu-link">
                                        <div class="footer__menu-img-outer">
                                            <img src="img/mail.svg" alt="img">
                                        </div>
                                        support@mail.com
                                    </a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="#" class="footer__menu-link">
                                        <div class="footer__menu-img-outer">
                                            <img src="img/facebook.svg" alt="img">
                                        </div>
                                        Facebook
                                    </a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="#" class="footer__menu-link">
                                        <div class="footer__menu-img-outer">
                                            <img src="img/insta.svg" alt="img">
                                        </div>
                                        Instagram
                                    </a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="#" class="footer__menu-link">
                                        <div class="footer__menu-img-outer">
                                            <img src="img/telegram.svg" alt="img">
                                        </div>
                                        Telegram
                                    </a>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <p class="header__copy">© 2021 - 2022 24Pay.Io</p>
        </footer>

@include('frontend/partials/footer')
