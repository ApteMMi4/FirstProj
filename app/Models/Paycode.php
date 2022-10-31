<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paycode extends Model
{
    use HasFactory;

    protected $table = 'paycodes';

    protected $fillable = [

        'user_id_from', //id юзера-создателя пейкода
        'user_id_to', //id юзера-получателя пейкода, может быть пустым

        'paycode_id', //сам код, Str::random, 16 chars max
        'paycode_currency', //валюта кода
        'paycode_amount', //сумма кода
        'status', //статус, 0 - создан, 1 - погашен, 2 - заблокирован, 3 - удалён
    ];

    public function user_from()
    {
      return $this->belongsTo('App\Models\User', 'user_id_from');
    }
    public function user_to()
    {
      return $this->belongsTo('App\Models\User', 'user_id_to');
    }
}
