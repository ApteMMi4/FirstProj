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
                        <a class="header__nav-link" href="about">О нас </a>
                    </li>
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="news">Новости</a>
                    </li>
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="contact">Контакты</a>
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
