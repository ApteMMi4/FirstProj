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
    <script src="{{ asset('js/toggle.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('frontend/custom/custom.css')}}?ver={{Str::random(16)}}">
    <link rel="stylesheet" href="{{ asset('custom/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/animate.min.css') }}">



</head>
<body>


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
                    @guest
                        <button class="main__btn main__btn--header"><a class="header__nav-link" href="{{ route('login') }}">Авторизация</a></button>
                    @else

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="main__btn main__btn--header">Выход</button>
                        </form>
                    @endguest

                </nav>
                <div class="burger burger--main">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

    </header>


    @yield('exchange')
    @yield('benefits')
    @yield('partners')




    <div class="popup popup--registration">
        <form class="popup__inner" action="/">
            <span class="popup__close popup__close--registration"></span>
            <h2 class="popup__title title-main fz27">Регистрация</h2>
            <input class="popup__input payment__input" name="login" placeholder="Логин" type="text">
            <input class="popup__input payment__input" name="password" placeholder="Пароль" type="password">
            <input class="popup__input payment__input" name="email" placeholder="E-mail" type="text">
            <input class="popup__input payment__input" name="tel" placeholder="Номер телефона" type="tel">
            <button class="main__btn main__btn--logo popup__btn">подключится</button>
        </form>
    </div>

    @include('auth._forms.login')




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
</div>
@inject('carbon', 'Carbon\Carbon')

    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


<script>
    function selectUsePay(obj){

        // $('input[name="select-radio"]').is(':checked')
        if ($(obj).is(':checked')) {
            var payment_list_id = $('input[name="select-radio"]:checked').val();

            $.ajax({
                url: "/pay-cul",
                type:"POST",
                data:{
                    paymentList:payment_list_id,
                    shop_id:{{$shop_id ?? ''}},
                    transaction_id:{{$transaction_id ?? ''}},
                    price:{{$price ?? ''}},
                },success: function(obj){
                    $('#payment-amount__sum').text(obj.total + ' ' + {{$currency ?? ''}});
                    alert('я пишу по русски');
                    document.forms[form_name].submit();
                    if (click_form) {
                        click_form['pay_s_id'].value = form_name;
                        click_form.submit();
                    }
                }
            });
        }
    }

    function use_online_pay(form_name, input_amount) {
        let paymentSum = $("#paymentSum").val().replace(',', '.');
        paymentSum = Math.ceil(parseFloat(paymentSum) * 100) / 100;
        let click_form = document.forms['click_collection'];

        if (paymentSum >= 1 && paymentSum < 10000) {
            if (input_amount.length) {
                $("form[name=" + form_name + "] input[name=" + input_amount + "]").val(paymentSum);
                if (click_form)
                    click_form['amount'].value = paymentSum;
            }


        } else {
            alert("Некорректно указана сумма. Допускается ввод суммы от 1 до 9999 грн.");
        }
    }

</script>

</body>
</html>

