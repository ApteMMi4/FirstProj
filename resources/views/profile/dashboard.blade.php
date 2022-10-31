

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
                <span>Главная</span>
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

{{--        @include('frontend/partials/sidebar')--}}



    <div class="page-content">
        <section class="static">
            <div class="turn-system">

                <div class="static-table admin-table user__table">
                    <div class="admin-table__row row-title">
                        <div class="admin-table__first">
                            Валюта
                        </div>
                        <div class="admin-table__two">
                            Всего
                        </div>

                        <div class="admin-table__three">
                            Доступно
                        </div>
                        <div class="admin-table__five">
                            Действия
                        </div>
                    </div>
                    <div class="admin-table__row">
                        <div class="admin-table__first">
                            <img loading="lazy" src={{asset("img/turn-system__item--icon.png")}} alt="img">
                            uah
                        </div>
                        @if(empty($trans->toArray()))
                            <div class="admin-table__two">
                                0,00
                            </div>
                        @endif
                            @if(empty($trans->toArray()))
                                <div class="admin-table__three">
                                    0,00
                                </div>
                        @endif
                                @if(!empty($trans->toArray()))
                        @foreach($trans as $item)
                            <div class="admin-table__two">
                                <span> {{$item->sum('total')}} </span>
                            </div>

                            <div class="admin-table__three">
                                <span> {{$item->sum('total')}} </span>
                            </div>

                        @endforeach

                        @endif
                        <div class="admin-table__five">
                            <button
                                class="admin-table__action gradi-btn btn-hover2 top-up-tr">Пополнить</button>
                            <a class="admin-table__action gradi-btn btn-hover2" href="{{route('profile_withdrawal')}}">Вывод</a>
                            <a class="admin-table__action gradi-btn btn-hover2" href="{{route('profile_exchange')}}">Обменять</a>
                        </div>
                    </div>
						 	<div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon2.png")}} alt="img">
									rub
								</div>
								<div class="admin-table__two">
									0.00
								</div>

								<div class="admin-table__three">
									0.00
								</div>
								<div class="admin-table__five">
									<button
										class="admin-table__action gradi-btn btn-hover2 top-up-tr">Пополнить</button>
									<a class="admin-table__action gradi-btn btn-hover2" href="conclusionsCreate">Вывод</a>
									<a class="admin-table__action gradi-btn btn-hover2" href="exchange">Обменять</a>
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon9.png")}} alt="img">
									usd
								</div>
								<div class="admin-table__two">
									0.00
								</div>

								<div class="admin-table__three">
									0.00
								</div>
								<div class="admin-table__five">
									<button
										class="admin-table__action gradi-btn btn-hover2 top-up-tr">Пополнить</button>
									<button class="admin-table__action gradi-btn btn-hover2">Вывод</button>
									<button class="admin-table__action gradi-btn btn-hover2">Обменять</button>
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon3.png")}} alt="img">
									btc
								</div>
								<div class="admin-table__two">
									0.000000
								</div>

								<div class="admin-table__three">
									0.000000
								</div>
								<div class="admin-table__five">
									<button
										class="admin-table__action gradi-btn btn-hover2 top-up-cr">Пополнить</button>
									<button class="admin-table__action gradi-btn btn-hover2">Вывод</button>
									<button class="admin-table__action gradi-btn btn-hover2">Обменять</button>
								</div>
							</div>

							<div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon4.png")}} alt="img">
									usdt
								</div>
								<div class="admin-table__two">
									0.000000
								</div>

								<div class="admin-table__three">
									0.000000
								</div>
								<div class="admin-table__five">
									<button class="admin-table__action gradi-btn btn-hover2 top-up-cr">Пополнить</button>
									<button class="admin-table__action gradi-btn btn-hover2">Вывод</button>
									<button class="admin-table__action gradi-btn btn-hover2">Обменять</button>
								</div>
							</div>
							 <div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon5.png")}} alt="img">
									eth
								</div>
								<div class="admin-table__two">
									0.000000
								</div>

								<div class="admin-table__three">
									0.000000
								</div>
								<div class="admin-table__five">
									<button
										class="admin-table__action gradi-btn btn-hover2 top-up-cr">Пополнить</button>
									<button class="admin-table__action gradi-btn btn-hover2">Вывод</button>
									<button class="admin-table__action gradi-btn btn-hover2">Обменять</button>
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon6.png")}} alt="img">
									usdt
								</div>
								<div class="admin-table__two">
									0.000000
								</div>

								<div class="admin-table__three">
									0.000000
								</div>
								<div class="admin-table__five">
									<button
										class="admin-table__action gradi-btn btn-hover2 top-up-cr">Пополнить</button>
									<button class="admin-table__action gradi-btn btn-hover2">Вывод</button>
									<button class="admin-table__action gradi-btn btn-hover2">Обменять</button>
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon7.png")}} alt="img">
									usdt
								</div>
								<div class="admin-table__two">
									0.000000
								</div>

								<div class="admin-table__three">
									0.000000
								</div>
								<div class="admin-table__five">
									<button
										class="admin-table__action gradi-btn btn-hover2 top-up-cr">Пополнить</button>
									<button class="admin-table__action gradi-btn btn-hover2">Вывод</button>
									<button class="admin-table__action gradi-btn btn-hover2">Обменять</button>
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first">
									<img loading="lazy" src={{asset("img/turn-system__item--icon8.png")}} alt="img">
									usdt
								</div>
								<div class="admin-table__two">
									0.000000
								</div>

								<div class="admin-table__three">
									0.000000
								</div>
								<div class="admin-table__five">
									<button
										class="admin-table__action gradi-btn btn-hover2 top-up-cr">Пополнить</button>
									<button class="admin-table__action gradi-btn btn-hover2">Вывод</button>
									<button class="admin-table__action gradi-btn btn-hover2">Обменять</button>
								</div>
							</div>
						</div>
					</div>

                </section>
			</div>
                    </div>
                </section>
		</div>


		<div class="popup top-up-modal top-up-tr-modal">
			<div class="popup__inner">
				<span class="popup__close popup__close--authorization"></span>
				<h2 class="popup__title title-main fz27">Пополнить</h2>
				<label class="checkbox-block checkbox-block-cur authorization-checkbox">
					<div class="checkbox-img-outer uah">
						Visa Mastercard
						<img src={{asset("img/card-white.svg")}} alt="img">
					</div>
                    <input type="checkbox">
				</label>
				<label class="hero__pay-input-outer pay-input-outer">
					<span class="hero__pay-input-sup pay-input-sup">Сумма</span>
					<div class="flex">
						<input class="hero__pay-input pay-input pay-input-c popup__input" type="number"
							placeholder="0.00">
					</div>

					<label class="checkbox-block authorization-checkbox">
                        <input type="checkbox">
						<a href="agreement" class="checkbox__text">
							Принимаю Пользовательское соглашение</a>
					</label>
				</label>

				<button class="hero__pay-btn pay-btn main__btn">
					Пополнить
				</button>
			</div>
		</div>

		<div class="popup top-up-modal top-up-cr-modal">
			<div class="popup__inner">
				<span class="popup__close popup__close--authorization"></span>
				<h2 class="popup__title title-main fz27">Пополнить</h2>

					<label class="checkbox-block checkbox-block-cur authorization-checkbox">
						<div class="checkbox-img-outer btc">
							<img src={{asset("img/btc.svg")}} alt="img">
						</div>
						<input class="checkbox " type="checkbox" >
					</label>

				<label class="hero__pay-input-outer pay-input-outer">
					<span class="hero__pay-input-sup pay-input-sup">Адрес</span>
					<input class="hero__pay-input pay-input popup__input" type="text" value="bsdfwt2t2r4gqwegvsbebnw4t324231">
				</label>
				<button class="hero__pay-btn pay-btn main__btn">
					Скопировать
				</button>
			</div>
		</div>
	</div>



@endsection

