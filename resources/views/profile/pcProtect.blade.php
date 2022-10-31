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
                </button>
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
            </div>
        </header>


    <div class="page-content">
        <section class="pc-profile">
            <div class="pc-profile__wrapper">
                <h2 class="pc-profile__title title fz18">Безопасность</h2>
            </div>


                <form class="pc-profile__form" method="POST" action="{{route('profile_2fagoogle')}}">
                    @csrf
                    @method('PUT')
                <div class="pc-profile__group">
                    <h2 class="pc-profile__title title fz18">Двухфакторная Аутентификация</h2>
                </div>
                <div class="pc-profile__group">
                    <p>Токен 2FA</p>
                    <div class="token__wrapper">
                        @if(!$user->twofagoogle)
                        <input class="payment__input pc-profile__input token" readonly value="@if($user->twofagoogle) @else{{$secret}}@endif"
                               name="google2fa_secret" type="text">
                        <input type="hidden" name="twofagoogle" value="@if($user->twofagoogle) 0 @else 1 @endif">

                        <div
                            class="pc-profile__btn gradi-btn btn-hover2">
                        <a class="header__nav-link" href="javascript:clickQrCode(this) " rel="0" style="color: white">QR-код</a>
                        </div>
                    </div>
                </div>

                <style>
                    .pc-profile__btn {
                        width: 143px;
                        height: 38px;
                        margin-top: 5px;
                        margin-bottom: 6px;
                    }
                    .header__nav-link {
                        color: #d7c8c8;
                        font-size: 24px;
                        font-weight: 600;
                        letter-spacing: 1.45px;
                        position: relative;
                    }
                </style>

                <div class="token__wrapper">
                    @if(!$user->twofagoogle)

                        <div id="qr-code" style="display: none">
                            <img src="{{ $QR_Image }}">
                        </div>
                    @endif
                </div>

                <div class="pc-profile__group">

                        <a href="javascript:clickQrCodic(this) " rel="0" style="color: white" >
                        <input type="button" value="Включить" class="token__btn gradi-btn btn-hover2" onclick="style.display='none'" href="javascript:clickQrCodic(this) " rel="0" style="color: white">
                           </a>

                        <div id="qr-codic" style="display: none">
                            <div>
                        <p>Пароль 2FA</p>
                        <input class="payment__input pc-profile__input" id='phone'  name="google2fa_pass" placeholder="Пароль 2FA" type="password" onkeyup="checkParams()">
                                <button id="submit" class="token__btn gradi-btn btn-hover2"  disabled>@if($user->twofagoogle) Выключить @else Включить @endif</button>

                            </div>
                        </div>
                    @else
                        <button type="submit" class="pc-profile__btn gradi-btn btn-hover2">@if($user->twofagoogle) Выключить @else Включить @endif</button>
                    @endif


                </div>


                </form>


            <div class="protect-table__wrapper">
					<div class="protect-table__outer">
						<div class="protect-table__header">
							<div class="protect-table__info">
								<h3 class="protect-table__title fz18 title">
									Активные сессии
								</h3>
								<p class="protect-table__text">
									Активные сессии под вашим аккаунтом
								</p>
							</div>
							<button class="protect-table__btn pc-profile__btn gradi-btn btn-hover2">
								Завершить все
							</button>
						</div>
						<div class="protect-table pc-api-table admin-table user__table">
							<div class="admin-table__row row-title">
								<div class="admin-table__first admin-table__el">
									Дата
								</div>
								<div class="admin-table__two admin-table__el">
									OC
								</div>

								<div class="admin-table__six admin-table__el">
									IP Address
								</div>

								<div class="admin-table__six admin-table__el">
									Локация
								</div>

								<div class="admin-table__six admin-table__el">
									Текущая
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022
								</div>
								<div class="admin-table__two admin-table__el">
									N/A
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>

								<div class="admin-table__six admin-table__el">
									Moskow, Russia
								</div>

								<div class="admin-table__six admin-table__el">
									<img src={{asset("img/ok.svg")}} alt="img">
								</div>
								<button class="pc-api-trash">
									<img src={{asset("img/trash.svg")}} alt="img">
								</button>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022
								</div>
								<div class="admin-table__two admin-table__el">
									N/A
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>

								<div class="admin-table__six admin-table__el">
									Moskow, Russia
								</div>

								<div class="admin-table__six admin-table__el">
									<img src={{asset("img/ok.svg")}} alt="img">
								</div>
								<button class="pc-api-trash">
									<img src={{asset("img/trash.svg")}} alt="img">
								</button>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022
								</div>
								<div class="admin-table__two admin-table__el">
									N/A
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>

								<div class="admin-table__six admin-table__el">
									Moskow, Russia
								</div>

								<div class="admin-table__six admin-table__el">
									<img src={{asset("img/ok.svg")}} alt="img">
								</div>
								<button class="pc-api-trash">
									<img src={{asset("img/trash.svg")}} alt="img">
								</button>
							</div>
						</div>
					</div>

					<div class="protect-table__outer">
						<div class="protect-table__header">
							<div class="protect-table__info">
								<h3 class="protect-table__title fz18 title">
									Подтвержденные устройства
								</h3>
								<p class="protect-table__text">
									Список подтвержденных устройств
								</p>
							</div>
							<button class="protect-table__btn pc-profile__btn gradi-btn btn-hover2">
								Завершить все
							</button>
						</div>
						<div class="protect-table pc-api-table admin-table user__table">
							<div class="admin-table__row row-title">
								<div class="admin-table__first admin-table__el">
									Дата
								</div>
								<div class="admin-table__two admin-table__el">
									OC
								</div>

								<div class="admin-table__six admin-table__el">
									IP Address
								</div>

								<div class="admin-table__six admin-table__el">
									Локация
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022
								</div>
								<div class="admin-table__two admin-table__el">
									N/A
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>

								<div class="admin-table__six admin-table__el">
									Moskow, Russia
								</div>

								<button class="pc-api-trash">
									<img src={{asset("img/trash.svg")}} alt="img">
								</button>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022
								</div>
								<div class="admin-table__two admin-table__el">
									N/A
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>

								<div class="admin-table__six admin-table__el">
									Moskow, Russia
								</div>

								<button class="pc-api-trash">
									<img src={{asset("img/trash.svg")}} alt="img">
								</button>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022
								</div>
								<div class="admin-table__two admin-table__el">
									N/A
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>

								<div class="admin-table__six admin-table__el">
									Moskow, Russia
								</div>

								<button class="pc-api-trash">
									<img src={{asset("img/trash.svg")}} alt="img">
								</button>
							</div>
						</div>
						<div class="protect-table pc-api-table admin-table user__table">
							<div class="admin-table__row row-title">
								<div class="admin-table__first admin-table__el">
									Дата
								</div>
								<div class="admin-table__two admin-table__el">
									OC
								</div>

								<div class="admin-table__six admin-table__el">
									IP Address
								</div>

								<div class="admin-table__six admin-table__el">
									Локация
								</div>
							</div>
							<div class="admin-table__row fc">
								<div class="admin-table__first admin-table__el">
									<span>Нет подтвержденных устройств</span>
								</div>
							</div>
						</div>
					</div>

					<div class="protect-table__outer">
						<div class="protect-table__header">
							<div class="protect-table__info">
								<h3 class="protect-table__title fz18 title">
									Активность аккаунта
								</h3>
								<p class="protect-table__text">
									Последние записи активности
								</p>
							</div>
							<button class="protect-table__btn pc-profile__btn gradi-btn btn-hover2">
								Просмотреть все
							</button>
						</div>
						<div class="protect-table pc-api-table admin-table user__table">
							<div class="admin-table__row row-title">
								<div class="admin-table__first admin-table__el">
									Дата
								</div>
								<div class="admin-table__two admin-table__el">
									Источник
								</div>

								<div class="admin-table__six admin-table__el">
									IP Address
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022 <span>14:40:41</span>
								</div>
								<div class="admin-table__two admin-table__el">
									Mozilla/5.0(Windows NT 10.0; Win64; x64) Apple Webkit/537.36 (KHTML, Like Gecko)
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022 <span>14:40:41</span>
								</div>
								<div class="admin-table__two admin-table__el">
									Mozilla/5.0(Windows NT 10.0; Win64; x64) Apple Webkit/537.36 (KHTML, Like Gecko)
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>
							</div>
							<div class="admin-table__row">
								<div class="admin-table__first admin-table__el">
									20/12/2022 <span>14:40:41</span>
								</div>
								<div class="admin-table__two admin-table__el">
									Mozilla/5.0(Windows NT 10.0; Win64; x64) Apple Webkit/537.36 (KHTML, Like Gecko)
								</div>

								<div class="admin-table__six admin-table__el">
									185.161.208.31
								</div>
							</div>
						</div>
					</div>
				</div>
                </form>
            </section>
		</div>

	</div>

<script>
    function clickQrCode(object){
        var isOpen = $(object).attr('rel');
        if (!isOpen) {
            $("#qr-code").show(500);
            $(object).attr('rel', 1);
        }
        else {
            $("#qr-code").hide(500);
            $(object).attr('rel', 0);
        }

    }
</script>
    <script>
        function clickQrCodic(object){
            var isOpen = $(object).attr('rell');
            if (!isOpen) {
                $("#qr-codic").show(1000);
                $(object).attr('rell', 1);
            }
            else {
                $("#qr-codic").hide(1000);
                $(object).attr('rell', 0);
            }

        }
    </script>
    <script>
        function checkParams() {
            var phone = $('#phone').val();

            if(phone.length != 0) {
                $('#submit').removeAttr('disabled');
            } else {
                $('#submit').attr('disabled', 'disabled');
            }
        }
    </script>


</body>

@endsection
