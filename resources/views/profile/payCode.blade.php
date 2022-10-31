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


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>

<body>
<div class="page">
    <header class="header-admin">
        <div class="header-admin__left">
            <a href="{{ route('profile_index') }}" class="header-admin__logo">
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
                <span>Pay-Code</span>
                <span></span>
            </div>
        </div>
        <div class="header-profile">
            <div class="hero__pay-cur-outer pay-cur-outer">
                <div class="pay-cur">
                    <img loading="lazy" src={{asset("img/lang.svg")}} alt="img">
                    <span class="pay-cur-span lang">RU</span>
                    <img loading="lazy" src={{asset("img/arrow-down.svg")}} alt="img">
                </div>
                <ul class="pay-cur-list lang-list">
                    <li class="lang-item">
                        UA
                    </li>
                    <li class="lang-item">
                        EN
                    </li>

                </ul>
            </div>
            <div class="header-profile" >
                <button class="profile-main__btn profile-hover">
                    <div class="profile__inner">
                        <img class="profile__icon1" loading="lazy" src={{asset("img/avatar.svg")}} alt="">
                        <span class="profile__text">{{ Auth::user()->name }}</span>
                        <img class="profile__icon2" loading="lazy" src={{asset("img/settings.png")}} alt="">
                    </div>
                </button>
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



    <nav class="nav">
        <ul class="nav__list ">
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/home.svg")}} alt="img">
                <a href="{{route('profile_statUser')}}" class="nav__link">Главная</a>
            </li>

            <li class="nav__item">
                <img loading="lazy" src={{asset("img/exch.svg")}} alt="img">
                <a href="{{route('profile_exchange')}}" class="nav__link">Обмен</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/transfers.svg")}} alt="img">
                <a href="{{route('profile_transfers')}}" class="nav__link">Переводы</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/pay-code.svg")}} alt="img">
                <a href="{{route('profile_payCode')}}" class="nav__link">Pay-Code</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/story.svg")}} alt="img">
                <a href="{{route('profile_userTransact')}}" class="nav__link ">История</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/withdrawal.svg")}} alt="img">
                <span class="nav__link ">Выводы</span>
                <ul class="submenu">
                    <li class="submenu__item">
                        <a href="{{route('profile_conclusionsCreate')}}" class="submenu__link ">Создать</a>
                    </li>
                    <li class="submenu__item">
                        <a href="{{ route('profile_conclusionsUser') }}" class="submenu__link ">История</a>
                    </li>
                    <li class="submenu__item">
                        <a href="{{ route('profile_conclusionsPays') }}" class="submenu__link ">Массовые выплаты</a>
                    </li>
                    <li class="submenu__item">
                        <a href="{{ route('profile_sample') }}" class="submenu__link ">Шаблоны</a>
                    </li>
                    {{--						<li class="submenu__item">--}}
                    {{--							<a href="discount" class="submenu__link ">Скидка</a>--}}
                    {{--						</li>--}}
                </ul>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/verify.svg")}} alt="img">
                <a href="{{route('profile_verify')}}" class="nav__link ">Верификация</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/payment.svg")}} alt="img">
                <a href="{{route('profile_arbitraryPayment')}}" class="nav__link @link6">Произвольный платеж</a>
            </li>
            <li class="nav__item">
                <img loading="lazy" src={{asset("img/news.svg")}} alt="img">
                <a href="{{route('profile_news')}}" class="nav__link @link7">Новости</a>
            </li>
        </ul>
        {{--	<a class="nav__link nav__link--bottom" href="https://docs.apipay.is">Документация</a>
            <a class="nav__link nav__link--bottom" href="#">Техническая поддержка</a>--}}
    </nav>




    <div class="page-body">

			<div class="page-content">
				<div class="pay-code-outer">
					<div class="flex">
						<section class="pay-code pay-code-act">
							<h3 class="pay-code__title title fz18">
								Активировать код
							</h3>

							<label class="hero__pay-input-outer pay-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">Введите код:</span>
								<input class="hero__pay-input pay-input popup__input" type="number">
							</label>

							<div class="flex">
								<button class="pay-code__btn pc-profile__btn gradi-btn btn-hover2">
									Проверить
								</button>

								<button class="pay-code__btn pc-profile__btn gradi-btn btn-hover2">
									Активировать
								</button>
							</div>

							<div class="pay-code__ques-outer">
								<a href="#" class="pay-code__ques">
									Как использовать?
								</a>
							</div>
						</section>

						<section class="pay-code pay-code-gen">
							<h3 class="pay-code__title title fz18">
								Создать код
							</h3>

							<div class="hero__pay-input-outer pay-input-outer transfers-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">Валюта:</span>
								<div class="select arbitrary-payment__select">
									<div class="select__top">
										<span class="select__top-title">UAH (1500)</span>
									</div>
									<div class="select__content">
										<div class="select__input">
											<input type="radio" name="select-radio">
											<span class="select__item">UAH (1500)</span>
										</div>
										<div class="select__input">
											<input type="radio" name="select-radio">
											<span class="select__item">USD (30.304)</span>
										</div>
										<div class="select__input">
											<input type="radio" name="select-radio">
											<span class="select__item">BTC (0.001)</span>
										</div>
									</div>
								</div>
							</div>

							<label class="hero__pay-input-outer pay-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">Введите сумму:</span>
								<input class="hero__pay-input pay-input popup__input" type="number">
							</label>

							<label class="hero__pay-input-outer pay-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">ID получателя:</span>
								<input class="hero__pay-input pay-input popup__input" type="number">
							</label>

							<button class="pay-code__btn pc-profile__btn gradi-btn btn-hover2">
								Создать
							</button>


							<div class="pay-code__ques-outer">
								<a href="#" class="pay-code__ques">
									Как создать?
								</a>
							</div>
						</section>
					</div>

					<section class="pay-code pay-code-my">
						<h3 class="pay-code__title title fz18">
							Мои коды
						</h3>

						<div class="pay-code__table-outer">
							<div class="admin-table user__table">
								<div class="admin-table__row row-title">
									<div class="admin-table__two admin-table__el">
										Дата создания
									</div>
									<div class="admin-table__six admin-table__el">
										Валюта
									</div>
									<div class="admin-table__seven admin-table__el">
										Код
									</div>
									<div class="admin-table__eight admin-table__el">
										Сумма
									</div>
									<div class="admin-table__nine admin-table__el">
										Статус
									</div>
								</div>
								<div class="admin-table__row">
									<div class="admin-table__two admin-table__el">
										18.08.2021
									</div>
									<div class="admin-table__six admin-table__el">
										uah
									</div>
									<div class="admin-table__seven admin-table__el">
										101010-asfdw-qwe23-asdfs-23334-asfsa-asdfs
										<button class="copy">
											<img src={{asset("img/copy.svg")}} alt="img">
										</button>
									</div>
									<div class="admin-table__eight admin-table__el">
										52780 uah
										<span>= $1789.44</span>
									</div>
									<div class="admin-table__nine admin-table__el">
										<span>Активирован</span>
										04.06.2022 02:44:19
									</div>
								</div>
								<div class="admin-table__row">
									<div class="admin-table__two admin-table__el">
										18.08.2021
									</div>
									<div class="admin-table__six admin-table__el">
										uah
									</div>
									<div class="admin-table__seven admin-table__el">
										101010-asfdw-qwe23-asdfs-23334-asfsa-asdfs
										<button class="copy">
											<img src={{asset("img/copy.svg")}} alt="img">
										</button>
									</div>
									<div class="admin-table__eight admin-table__el">
										52780 uah
										<span>= $1789.44</span>
									</div>
									<div class="admin-table__nine admin-table__el">
										<span>Активирован</span>
										04.06.2022 02:44:19
									</div>
								</div>
								<div class="admin-table__row">
									<div class="admin-table__two admin-table__el">
										18.08.2021
									</div>
									<div class="admin-table__six admin-table__el">
										uah
									</div>
									<div class="admin-table__seven admin-table__el">
										101010-asfdw-qwe23-asdfs-23334-asfsa-asdfs
										<button class="copy">
											<img src={{asset("img/copy.svg")}} alt="img">
										</button>
									</div>
									<div class="admin-table__eight admin-table__el">
										52780 uah
										<span>= $1789.44</span>
									</div>
									<div class="admin-table__nine admin-table__el">
										<span>Активирован</span>
										04.06.2022 02:44:19
									</div>
								</div>
								<div class="admin-table__row">
									<div class="admin-table__two admin-table__el">
										18.08.2021
									</div>
									<div class="admin-table__six admin-table__el">
										uah
									</div>
									<div class="admin-table__seven admin-table__el">
										101010-asfdw-qwe23-asdfs-23334-asfsa-asdfs
										<button class="copy">
											<img src={{asset("img/copy.svg")}} alt="img">
										</button>
									</div>
									<div class="admin-table__eight admin-table__el">
										52780 uah
										<span>= $1789.44</span>
									</div>
									<div class="admin-table__nine admin-table__el">
										<span>Активирован</span>
										04.06.2022 02:44:19
									</div>
								</div>
								<div class="admin-table__row">
									<div class="admin-table__two admin-table__el">
										18.08.2021
									</div>
									<div class="admin-table__six admin-table__el">
										uah
									</div>
									<div class="admin-table__seven admin-table__el">
										101010-asfdw-qwe23-asdfs-23334-asfsa-asdfs
										<button class="copy">
											<img src={{asset("img/copy.svg")}} alt="img">
										</button>
									</div>
									<div class="admin-table__eight admin-table__el">
										52780 uah
										<span>= $1789.44</span>
									</div>
									<div class="admin-table__nine admin-table__el">
										<span>Активирован</span>
										04.06.2022 02:44:19
									</div>
								</div>
							</div>

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
					</section>
				</div>
			</div>

		</div>
	</div>
	<script src="/js/vendor.js"></script>
	<script src="/js/main.js"></script>
</body>

</html>
