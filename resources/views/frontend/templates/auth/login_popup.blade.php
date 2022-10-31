<div class="popup popup--authorization">
    <form class="popup__inner" method="POST" action="{{ route('login') }}">
        @csrf
        <span class="popup__close popup__close--authorization"></span>
        <h2 class="popup__title title-main fz27">Авторизация</h2>
        <div class="popup__wrapper">
            <img class="popup__img" src="img/profile.png" alt="img">
            <input class="popup__input popup__input--password payment__input" @error('email') is-invalid @enderror"
            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="text">
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror

        <div class="popup__wrapper">
            <img class="popup__img" src="img/key.png" alt="img">
            <input class="popup__input popup__input--password payment__input @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password" type="password">
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
    </span>
        @enderror

        <div class="popup__box">
            <a href="{{route('auth::uforgot')}}" class="">Забыли пароль?</a>
            <span class="popup__link-registration">Регистрация</span>
        </div>

        <button type="submit" class="main__btn main__btn--header popup__btn">подключится</button>
    </form>
</div>
