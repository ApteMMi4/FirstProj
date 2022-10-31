
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
                    <span>Верификация</span>
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








{{--			<div class="page-content">--}}
{{--				<section class="static">--}}

		<div class="popup top-up-modal top-up-tr-modal">
			<div class="popup__inner">
				<span class="popup__close popup__close--authorization"></span>
				<h2 class="popup__title title-main fz27">Пополнить</h2>
				<label class="checkbox-block checkbox-block-cur authorization-checkbox">
					<div class="checkbox-img-outer uah">
						Visa Mastercard
						<img src="img/card-white.svg" alt="img">
					</div>
					<input class="checkbox " type="checkbox" checked>
				</label>
				<label class="hero__pay-input-outer pay-input-outer">
					<span class="hero__pay-input-sup pay-input-sup">Сумма</span>
					<div class="flex">
						<input class="hero__pay-input pay-input pay-input-c popup__input" type="number"
							placeholder="0.00">
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
		</div>

		<div class="popup top-up-modal top-up-cr-modal">
			<div class="popup__inner">
				<span class="popup__close popup__close--authorization"></span>
				<h2 class="popup__title title-main fz27">Пополнить</h2>

					<label class="checkbox-block checkbox-block-cur authorization-checkbox">
						<div class="checkbox-img-outer btc">
							<img src="img/btc.svg" alt="img">
						</div>
						<input class="checkbox " type="checkbox" checked>
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
