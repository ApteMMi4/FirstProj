<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    const ADMIN = 'admin';
    const USER = 'user';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verify_code',
        'email_verified_at',
        'phone',
        'status',
        'password',
        'google2fa_secret',
        'twofagoogle',
        'kuna',
        '4bil',
        'global',
        'role'



    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret',
        'twofagoogle',
        'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    public function is2Fa()
    {
        return isset($this->google2fa_secret);
    }

    public function setGoogle2faSecretAttribute($value)
    {
         $this->attributes['google2fa_secret'] = encrypt($value);
    }

    public function getGoogle2faSecretAttribute($value)
    {

        return ($value)?decrypt($value):'';
    }

    public function paycodes()
    {
        return $this->hasMany(Paycode::class, 'user_id_from');
    }

    public function news()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ],($request->get('remember_me')=='on' ? true : false))) {

            //?????????? ?????? ?????? ?????????????? ??????????????????????
        }
        if (Auth::check() || Auth::viaRemember()) //?????????????? ???????????? ????????????????????????????
        {
            return redirect('/dashboard'); // ?? ???????? ???????????????? ?? ??????????????
        } else {
//            return redirect('/login'); // ???????????????? ????????????
        }
    }
//    public function isAdmin()
//    {
//        return $this->role()->where('admin', 'Administrator')->first();
//    }

    public function isAdmin(){
        return $this->role==self::ADMIN;


    }

    public function isUser(){
        return $this->role==self::USER;

    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'shop_id');
    }



}
