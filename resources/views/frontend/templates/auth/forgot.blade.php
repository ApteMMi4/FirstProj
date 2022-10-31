@extends('frontend.layouts.frontend')

@section('content')

<form class="popup__inner popup-authorization" method="POST" action="{{ route('auth::uforgot.store') }}">
@csrf

  <h2 class="popup__title title-main fz27">Восстановление пароля</h2>

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

  <button type="submit" class="hero__pay-btn pay-btn main__btn">Восстановить пароль</button>

</form>
@endsection
