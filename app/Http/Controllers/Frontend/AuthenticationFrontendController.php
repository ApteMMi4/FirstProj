<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


use Redirect;
//Facades and helpers
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

//Models
use App\Models\User;

class AuthenticationFrontendController extends Controller
{

  //Верификация почты
  public function verify(Request $request)
  {
    $verify_code = $request->verify_code;
    $user = User::where('email_verify_code', $verify_code)->first();
    if($user !== null)
    {
      $user->email_verify_code = null;
      $user->email_verified_at = Carbon::now();
      $user->save();

      $notice_text = 'Ваш email успешно верифицирован';
      return view('frontend.templates.noauth.success_verify', compact('notice_text'));
    }
    else
    {
      abort(404);
    }
  }

  //Авторизация, форма
  public function login(Request $request)
  {
    return view('frontend.templates.auth.login');
  }
  //Регистрация, форма
  public function signup(Request $request)
  {
    return view('frontend.templates.auth.signup');
  }

  //Восстановление доступа, форма
  public function forgot(Request $request)
  {
    return view('frontend.templates.auth.forgot');
  }
  //Восстановление доступа, форма
  public function forgotStore(Request $request)
  {
    $email = $request->email;

    $user = User::where('email', $email)->first();
    if($user !== null)
    {
      $newPass = Str::random(16);
      $user->password = Hash::make($newPass);
      $user->save();

      $text  = '<p><strong>Здравствуйте!</strong></p>';
      $text .= '<p>Кто-то, возможно вы, запросил смену пароля. Новый пароль: <span
        style="color: #DB1464 !important; font-weight: 600">' . $newPass . '</span></p>';

      $text .= '<p>При возникновении вопросов, вы можете обратиться в службу поддержки на нашем сайте или написать нам на почту:  <a href="mailto:24PAY.IO.@mail.com" style="color: #DB1464 !important;">24PAY.IO.@mail.com</a></p>';

      sendEmailNotify($user->email, 'Восстановление доступа', 'Apipay', 'Восстановление доступа', $text, 'forgot', null);
    }

    $notice_text = 'На указанный адрес отправлен новый пароль';
    return view('frontend.templates.noauth.success_verify', compact('notice_text'));

  }

  public function signupStore(Request $request)
  {
    $name = 'TemporaryName';
    $email = $request->email;
    $phone = $request->phone;
    $password = $request->password;
    $password_confirm = $request->password_confirm;
    $errors = array();

    if(isset($phone) && isset($email) && isset($password) && isset($password_confirm))
    {
      if($password != $password_confirm)
      {
        array_push($errors, 'Пароль и подтверждение пароля не совпадает');
      }
      else
      {
        $password = Hash::make($password);

        $checkEmailFree = User::where('email', $email)->first();
        if(isset($checkEmailFree) && $checkEmailFree != null)
        {
          array_push($errors, 'Регистрация с указанным Email невозможна');
          return redirect()->route('auth::usignup')->with('errors', $errors);
        }


        $userData = [
          'name' => $name,
          'role_id' => 'user', //как пользователь
          'password' => $password,
          'email' => $email,
          'email_verify_code' => Str::random(64),
          'status' => 1,
          'phone' => $phone
        ];
        $user = User::create($userData);

        $user->name = "U" . ($user->id);
        $user->save();

        $credentials = [
          'email' => $email,
          'password' => $request->password
        ];

        if (Auth::attempt($credentials))
        {
          //$verify_link = route('signup.email.verify', ['u' => $user->id, 'code' => $user->email_verify_code]);
          $verify_link = route('auth::uverify', ['verify_code' => $user->email_verify_code]);

          $text  = '<p><strong>Здравствуйте!</strong></p>';
          $text .= '<p>Аккаунт успешно зарегистрирован, для входа используйте логин: <span
            style="color: #DB1464 !important; font-weight: 600">' . $email . '</span></p>';

          $text .= '<p>Для активации аккаунта перейдите по ссылке:  <a href="' . $verify_link . '" style="color: #DB1464 !important;">' . $verify_link . '</a></p>';

          $text .= '<p>При возникновении вопросов, вы можете обратиться в службу поддержки на нашем сайте или написать нам на почту:  <a href="mailto:24PAY.IO.@mail.com" style="color: #DB1464 !important;">24PAY.IO.@mail.com</a></p>';

          sendEmailNotify($user->email, 'Успешная регистрация', 'Apipay', 'Регистрация', $text, 'registration', $verify_link);


          $request->session()->regenerate();
          return redirect()->route('profile_statUser');
        }
        else
        {
          array_push($errors, 'Что-то пошло не так и мы не смогли автоматически авторизовать вас в личном кабинете');
        }


      }
    }
    else
    {
      array_push($errors, 'Все поля обязательны для заполнения');
    }

    return redirect()->route('auth::usignup')->with('errors', $errors);
  }



}
