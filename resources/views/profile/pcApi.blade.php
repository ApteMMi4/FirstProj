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
                    <span>Профиль</span>
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
							<img src={{asset("img/trash.svg")}} alt="img">
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
							<img src={{asset("img/trash.svg")}} alt="img">
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
							<img src={{asset("img/trash.svg")}} alt="img">
						</button>
					</div>
				</div>
			</section>
		</div>

	</div>

</body>

@endsection
