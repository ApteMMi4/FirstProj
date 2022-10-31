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
        <span>@yield('page-title')</span>
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
      <button class="profile-main__btn profile-hover">
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

  </header>

  @include('frontend/partials/sidebar')
