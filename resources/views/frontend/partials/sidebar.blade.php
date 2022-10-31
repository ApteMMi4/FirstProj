<nav class="nav">
    <ul class="nav__list ">
        <li class="nav__item">
            <img src="{{asset('frontend/img/home.svg')}}" alt="img">
            <a href="{{route('profile_dashboard')}}" class="nav__link" >Главная</a>
        </li>
        <li class="nav__item">
            <img src="{{asset('frontend/img/exch.svg')}}" alt="img">
            <a href="{{route('profile_exchange')}}" class="nav__link">Обмен</a>
        </li>
        <li class="nav__item">
            <img src="{{asset('frontend/img/transfers.svg')}}" alt="img">
            <a href="{{route('profile_transfers')}}" class="nav__link">Переводы</a>
        </li>
        <li class="nav__item">
            <img src="{{asset('frontend/img/pay-code.svg')}}" alt="img">
            <a href="{{route('paycode::cabinet.index.get')}}" class="nav__link">Pay-Code</a>
        </li>
        <li class="nav__item">
            <img src="{{asset('frontend/img/story.svg')}}" alt="img">
            <a href="{{route('profile_history')}}" class="nav__link ">История</a>
        </li>
        <li class="nav__item">
            <img  src={{asset("img/withdrawal.svg")}} alt="img">
            <span class="nav__link ">Выводы</span>
            <ul class="submenu" @if(Request::is('cabinet/withdrawal') || Request::is('withdrawalHistory')) style="display: block" @endif>
                <li class="submenu__item" >
                    <a href="{{route('profile_withdrawal')}}" class="submenu__link ">Создать</a>
                </li>
                <li class="submenu__item" >
                    <a href="{{ route('profile_withdrawalHistory') }}" class="submenu__link ">История</a>
                </li>
{{--                <li class="submenu__item">--}}
{{--                    <a href="{{ route('profile_conclusionsPays') }}" class="submenu__link ">Массовые выплаты</a>--}}
{{--                </li>--}}
{{--                <li class="submenu__item">--}}
{{--                    <a href="{{ route('profile_sample') }}" class="submenu__link ">Шаблоны</a>--}}
{{--                </li>--}}
{{--                <li class="submenu__item">--}}
{{--                    <a href="discount" class="submenu__link ">Скидка</a>--}}
{{--                </li>--}}
            </ul>
        </li>
        <li class="nav__item">
            <img src="{{asset('frontend/img/verify.svg')}}" alt="img">
            <a href="{{route('profile_verify')}}" class="nav__link ">Верификация</a>
        </li>
        <li class="nav__item">
            <img src="{{asset('frontend/img/payment.svg')}}" alt="img">
            <a href="{{route('profile_invoice')}}" class="nav__link @link6">Произвольный платеж</a>
        </li>
        <li class="nav__item">
            <img src="{{asset('frontend/img/news.svg')}}" alt="img">
            <a href="{{route('profile_news')}}" class="nav__link @link7">Новости</a>
        </li>
        <li class="nav__item">
            <a class="nav__link nav__link--bottom" href="#"></a>
        </li>
        <li class="nav__item">
            <a class="nav__link nav__link--bottom" href="https://docs.apipay.is">Документация</a>
            <a class="nav__link nav__link--bottom" href="#">Техническая поддержка</a>
        </li>
    </ul>

</nav>
