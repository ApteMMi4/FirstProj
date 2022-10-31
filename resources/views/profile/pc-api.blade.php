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
				<a href="personal-area.html" class="header-admin__logo">
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
					<span>Профиль</span>
					<span></span>
				</div>
			</div>
			<div class="header-profile">
				<div class="hero__pay-cur-outer pay-cur-outer">
					<div class="pay-cur">
						<img src="img/lang.svg" alt="img">
						<span class="pay-cur-span lang">укр.</span>
						<img src="img/arrow-down.svg" alt="img">
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
				<button class="profile-main__btn profile-hover">
					<div class="profile__inner">
						<img class="profile__icon1" loading="lazy" src="img/avatar.svg" alt="">
						<span class="profile__text">Mrvintage</span>
						<img class="profile__icon2" loading="lazy" src="img/settings.png" alt="">
					</div>
				</button>
				<div class="profile__content">
					<a href="pc-profile.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src="img/profile.png" alt="">
						<span class="profile__btn-text profile__btn-text--one">Профиль</span>
					</a>
					<a href="pc-alert.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src="img/alert.png" alt="">
						<span class="profile__btn-text">Оповещения</span>
					</a>
					<a href="pc-protect.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src="img/protect.png" alt="">
						<span class="profile__btn-text">Безопасность</span>
					</a>
					<a href="pc-api.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src="img/api.png" alt="">
						<span class="profile__btn-text">API ключи</span>
					</a>
					<a href="password.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src="img/password.png" alt="">
						<span class="profile__btn-text">Изменить пароль</span>
					</a>
					<button class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src="img/exit.png" alt="">
						<span class="profile__btn-text">Выйти</span>
					</button>
				</div>
			</div>

		</header>


		<div class="navigation">
			<a class="navigation__link" href="admin-currencies.html">Админка валюты</a>
			<a class="navigation__link" href="admin-direction.html">Направление обмена</a>
			<a class="navigation__link" href="admin-transactions.html">Админка транзакции</a>
			<a class="navigation__link" href="admin-users.html">Админка обмен валю пользователи</a>
			<a class="navigation__link" href="admin.html">Админка</a>
			<a class="navigation__link" href="arbitrary-payment-link.html">Лк произвольный платеж ссылка</a>
			<a class="navigation__link" href="arbitrary-payment.html">Лк произвольный платеж</a>
			<a class="navigation__link" href="conclusions.html">Админка вывод</a>
			<a class="navigation__link" href="discount.html">Лк скидка</a>
			<a class="navigation__link" href="exchange-requests.html">Админка обмен валю заявки</a>
			<a class="navigation__link" href="index.html">главная</a>
			<a class="navigation__link" href="main-arbitrary-payment.html">главная Произвольный платеж</a>
			<a class="navigation__link" href="main-arbitrary-payment2.html">главная Произвольный платеж2</a>
			<a class="navigation__link" href="main-exchange.html">Главная обмен 2</a>
			<a class="navigation__link" href="main-exchange2.html">Главная обмен 3</a>
			<a class="navigation__link" href="output-create.html">Лк вывод</a>
			<a class="navigation__link" href="output.html">Лк вывод история</a>
			<a class="navigation__link" href="payment.html">Лк вывод масов</a>
			<a class="navigation__link" href="pc-profile.html">Лк профиль</a>
			<a class="navigation__link" href="pc-transactions.html">Лк транзакции</a>
			<a class="navigation__link" href="personal-area.html">Лк</a>
			<a class="navigation__link" href="ref-prog-settings.html">Админка валюты партнерка</a>
			<a class="navigation__link" href="sample.html">Лк вывод шаблоны</a>
			<a class="navigation__link" href="user-page.html">Админка пользователи</a>

		</div>

		<nav class="nav">
			<ul class="nav__list ">
				<li class="nav__item">
					<img src="img/home.svg" alt="img">
					<a href="personal-area.html" class="nav__link">Главная</a>
				</li>
				<li class="nav__item">
					<img src="img/exch.svg" alt="img">
					<a href="exchange.html" class="nav__link">Обмен</a>
				</li>
				<li class="nav__item">
					<img src="img/transfers.svg" alt="img">
					<a href="transfers.html" class="nav__link">Переводы</a>
				</li>
				<li class="nav__item">
					<img src="img/pay-code.svg" alt="img">
					<a href="pay-code.html" class="nav__link">Pay-Code</a>
				</li>
				<li class="nav__item">
					<img src="img/story.svg" alt="img">
					<a href="pc-transactions.html" class="nav__link ">История</a>
				</li>
				<li class="nav__item">
					<img src="img/withdrawal.svg" alt="img">
					<span class="nav__link ">Выводы</span>
					<ul class="submenu">
						<li class="submenu__item">
							<a href="output-create.html" class="submenu__link ">Создать</a>
						</li>
						<li class="submenu__item">
							<a href="output.html" class="submenu__link ">История</a>
						</li>
						<li class="submenu__item">
							<a href="payment.html" class="submenu__link ">Массовые выплаты</a>
						</li>
						<li class="submenu__item">
							<a href="sample.html" class="submenu__link ">Шаблоны</a>
						</li>
						<li class="submenu__item">
							<a href="discount.html" class="submenu__link ">Скидка</a>
						</li>
					</ul>
				</li>
				<li class="nav__item">
					<img src="img/verify.svg" alt="img">
					<a href="verify.html" class="nav__link ">Верификация</a>
				</li>
				<li class="nav__item">
					<img src="img/payment.svg" alt="img">
					<a href="arbitrary-payment.html" class="nav__link @link6">Произвольный платеж</a>
				</li>
				<li class="nav__item">
					<img src="img/news.svg" alt="img">
					<a href="#" class="nav__link @link7">Новости</a>
				</li>
			</ul>
			<a class="nav__link nav__link--bottom" href="https://docs.apipay.is">Документация</a>
			<a class="nav__link nav__link--bottom" href="#">Техническая поддержка</a>
		</nav>

		<div class="page-content">
			<section class="pc-profile">
				<div class="pc-profile__wrapper">
					<h2 class="pc-profile__title title fz18">API ключи</h2>
				</div>

				<section class="pay-code api">
					<h3 class="pay-code__title title fz18">
						Создать новый API ключ
					</h3>

					<label class="hero__pay-input-outer pay-input-outer">
						<span class="hero__pay-input-sup pay-input-sup">Имя ключа:</span>
						<input class="hero__pay-input pay-input popup__input" type="text">
					</label>
					
					<div class="alert">
						<div class="alert-block">
							<div class="alert-api">
								Можно торговать
							</div>
						</div>
						<button class="alert-change switch-btn switch-on"></button>
					</div>
					<div class="alert">
						<div class="alert-block">
							<div class="alert-api">
								Можно выводить средства
							</div>
						</div>
						<button class="alert-change switch-btn switch"></button>
					</div>
					<div class="alert">
						<div class="alert-block">
							<div class="alert-api">
								Белый список IP
							</div>
						</div>
						<a href="#" class="alert-link">Создать</a>
					</div>

					<button class="pc-profile__btn gradi-btn btn-hover2">Создать</button>
				</section>


				<div class="pc-api-table admin-table user__table">
					<div class="admin-table__row row-title">
						<div class="admin-table__first">
							Имя ключа
						</div>
						<div class="admin-table__two">
							Публичный ключ
						</div>

						<div class="admin-table__six">
							Доступы
						</div>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__first">
							142
						</div>
						<div class="admin-table__two">
							asfdsfwqer2qr2352etfasdfq22112r21fq1
						</div>

						<div class="admin-table__six">
							read
						</div>
						<button class="pc-api-trash">
							<img src="img/trash.svg" alt="img">
						</button>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__first">
							142
						</div>
						<div class="admin-table__two">
							asfdsfwqer2qr2352etfasdfq22112r21fq1
						</div>

						<div class="admin-table__six">
							read
						</div>
						<button class="pc-api-trash">
							<img src="img/trash.svg" alt="img">
						</button>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__first">
							142
						</div>
						<div class="admin-table__two">
							asfdsfwqer2qr2352etfasdfq22112r21fq1
						</div>

						<div class="admin-table__six">
							read
						</div>
						<button class="pc-api-trash">
							<img src="img/trash.svg" alt="img">
						</button>
					</div>
				</div>
			</section>
		</div>

	</div>
	<script src="js/vendor.js"></script>
	<script src="js/main.js"></script>
</body>

</html>