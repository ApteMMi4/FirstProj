<div class="popup popup--registration">
    <form class="popup__inner" method="POST" action="{{ route('auth::usignup.store') }}">
      @csrf
        <span class="popup__close popup__close--registration"></span>
        <h2 class="popup__title title-main fz27">Регистрация</h2>


        <input class="popup__input payment__input" type="email" name="email" required placeholder="Email">

        <input class="popup__input payment__input" type="text" name="phone" required autofocus placeholder="Телефон">

        <input class="popup__input payment__input" type="password" name="password" required placeholder="Пароль">

        <input class="popup__input payment__input" type="password" name="password_confirm" required placeholder="Пароль ещё раз">


        <button class="main__btn main__btn--logo popup__btn">подключится</button>
    </form>
</div>
