@extends('frontend.layouts.frontend')

@section('content')

<form class="popup__inner popup-authorization" method="POST" action="{{ route('auth::usignup.store') }}">
@csrf

  <h2 class="popup__title title-main fz27">Регистрация</h2>

  @if(session('errors'))
    @foreach(session('errors') as $error)
    <div class="error-notice">
      <p>{{$error}}</p>
    </div>
    @endforeach
  @endif

  <div class="form-group custom-input-group">
    <input class="payment__input" type="email" name="email" required placeholder="Email">
  </div>

  <div class="form-group custom-input-group">
    <input class="payment__input" type="text" name="phone" required autofocus placeholder="Телефон">
  </div>

  <div class="form-group custom-input-group">
    <input class="payment__input" type="password" name="password" required placeholder="Пароль">
  </div>

  <div class="form-group custom-input-group">
    <input class="payment__input" type="password" name="password_confirm" required placeholder="Пароль ещё раз">
  </div>


  <button type="submit" class="main__btn main__btn--header">Зарегистрироваться</button>

</form>
@endsection
