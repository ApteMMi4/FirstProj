@include('frontend/partials/head')

<div class="page">
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a class="header__logo" href="{{ route('index') }}">
                    <img class="header__icon" src="{{asset('img/logo.png')}}" alt="">
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

    @include('frontend.templates.auth.registration_popup')
    @include('frontend.templates.auth.login_popup')

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
                                        <img src="{{asset('img/mail.svg')}}" alt="img">
                                    </div>
                                    support@mail.com
                                </a>
                            </li>
                            <li class="footer__menu-item">
                                <a href="#" class="footer__menu-link">
                                    <div class="footer__menu-img-outer">
                                        <img src="{{asset('img/facebook.svg')}}" alt="img">
                                    </div>
                                    Facebook
                                </a>
                            </li>
                            <li class="footer__menu-item">
                                <a href="#" class="footer__menu-link">
                                    <div class="footer__menu-img-outer">
                                        <img src="{{asset('img/insta.svg')}}" alt="img">
                                    </div>
                                    Instagram
                                </a>
                            </li>
                            <li class="footer__menu-item">
                                <a href="#" class="footer__menu-link">
                                    <div class="footer__menu-img-outer">
                                        <img src="{{asset('img/telegram.svg')}}" alt="img">
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
</div>

@include('frontend/partials/footer')
