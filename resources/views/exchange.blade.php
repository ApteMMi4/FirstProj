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
					<span>Обмен</span>
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
				<div class="profile-main__btn profile-hover">
					<div class="profile__inner">
						<img class="profile__icon1" loading="lazy" src={{asset("img/avatar.svg")}} alt="">
						<span class="profile__text">Mrvintage</span>
						<img class="profile__icon2" loading="lazy" src={{asset("img/settings.png")}} alt="">
					</div>
				</div>
				<div class="profile__content">
					<a href="pc-profile.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src={{asset("img/profile.png")}} alt="">
						<span class="profile__btn-text profile__btn-text--one">Профиль</span>
					</a>
					<a href="pc-alert.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src={{asset("img/alert.png")}} alt="">
						<span class="profile__btn-text">Оповещения</span>
					</a>
					<a href="pc-protect.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src={{asset("img/protect.png")}} alt="">
						<span class="profile__btn-text">Безопасность</span>
					</a>
					<a href="pc-api.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src={{asset("img/api.png")}} alt="">
						<span class="profile__btn-text">API ключи</span>
					</a>
					<a href="password.html" class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src={{asset("img/password.png")}} alt="">
						<span class="profile__btn-text">Изменить пароль</span>
					</a>
					<button class="profile__btn profile-hover">
						<img class="profile__icon3" loading="lazy" src={{asset("img/exit.png")}} alt="">
						<span class="profile__btn-text">Выйти</span>
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
					<a href="exchange" class="nav__link">Обмен</a>
				</li>
				<li class="nav__item">
					<img loading="lazy" src={{asset("img/transfers.svg")}} alt="img">
					<a href="transfers.html" class="nav__link">Переводы</a>
				</li>
				<li class="nav__item">
					<img loading="lazy" src={{asset("img/pay-code.svg")}} alt="img">
					<a href="pay-code.html" class="nav__link">Pay-Code</a>
				</li>
				<li class="nav__item">
					<img loading="lazy" src={{asset("img/story.svg")}} alt="img">
					<a href="pc-transactions.html" class="nav__link ">История</a>
				</li>
				<li class="nav__item">
					<img loading="lazy" src={{asset("img/withdrawal.svg")}} alt="img">
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
					<img loading="lazy" src={{asset("img/verify.svg")}} alt="img">
					<a href="verify.html" class="nav__link ">Верификация</a>
				</li>
				<li class="nav__item">
					<img loading="lazy" src={{asset("img/payment.svg")}} alt="img">
					<a href="arbitrary-payment.html" class="nav__link @link6">Произвольный платеж</a>
				</li>
				<li class="nav__item">
					<img loading="lazy" src={{asset("img/news.svg")}} alt="img">
					<a href="news.html" class="nav__link @link7">Новости</a>
				</li>
			</ul>
		{{--	<a class="nav__link nav__link--bottom" href="https://docs.apipay.is">Документация</a>
			<a class="nav__link nav__link--bottom" href="#">Техническая поддержка</a>--}}
		</nav>



		<div class="page-body">

			<div class="page-content">
				<section class="exch">
					<div class="exch__form-outer">
						<h1 class="exch__title fz18 title">
							Обмен
						</h1>
						<form class="exch__form" action="#">
							<label class="hero__pay-input-outer pay-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">Отдаете:</span>
								<span class="hero__pay-input-sub pay-input-sub">Баланс: <strong>0 <span
											class="pay-cur-span">UAH</span></strong></span>
								<div class="block">
									<input class="hero__pay-input pay-input popup__input" type="number">
									<div class="hero__pay-cur-outer pay-cur-outer">
										<div class="pay-cur">
											<span class="pay-cur-span">uah</span>
											<img src={{asset("img/arrow-down.svg")}} alt="img">
										</div>
										<ul class="pay-cur-list">
											<li class="pay-cur-list-item">
												uah
											</li>
											<li class="pay-cur-list-item">
												rub
											</li>
											<li class="pay-cur-list-item">
												usd
											</li>
											<li class="pay-cur-list-item">
												uah
											</li>
											<li class="pay-cur-list-item">
												uah
											</li>
										</ul>
									</div>
								</div>
							</label>
							<label class="hero__pay-input-outer pay-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">Получаете:</span>
								<div class="block">
									<input class="hero__pay-input pay-input popup__input" type="number">
									<div class="hero__pay-cur-outer pay-cur-outer">
										<div class="pay-cur">
											<span class="pay-cur-span no-change">btc</span>
											<img src={{asset("img/arrow-down.svg")}} alt="img">
										</div>
										<ul class="pay-cur-list">
											<li class="pay-cur-list-item">
												btc
											</li>
										</ul>
									</div>
								</div>
								<div class="blocck">
									<span class="hero__pay-input-sub pay-input-sub">Курс: <strong strong>1 <span
												class="pay-cur-span">EUR</span></strong><img src={{asset("img/arrow-rightt.svg")}}
											alt="img">
										<strong strong>1.302 <span class="pay-cur-span">USD</span></strong>
									</span>
									<span class="hero__pay-input-sub pay-input-sub">
										С учетом бонуса: 0%
									</span>
								</div>
							</label>
							<button class="exch__btn pc-profile__btn gradi-btn btn-hover2">К обмену</button>
						</form>
					</div>
				</section>


				<div class="admin-table user__table">
					<div class="admin-table__row row-title">
						<div class="admin-table__two">
							Дата
						</div>
						<div class="admin-table__seven">
							Продано
						</div>
						<div class="admin-table__eight">
							Куплено
						</div>
						<div class="admin-table__nine">
							Статус
						</div>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__two">
							18.08.2021
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
						<div class="admin-table__two">
							18.08.2021
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
						<div class="admin-table__two">
							18.08.2021
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
						<div class="admin-table__two">
							18.08.2021
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
						<div class="admin-table__two">
							18.08.2021
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

		</div>
	</div>
	<script src="js/vendor.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
