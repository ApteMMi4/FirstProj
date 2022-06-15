<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conclusions extends Model
{
    use HasFactory;

    protected $table = 'conclusions';

    protected $fillable = [
        'user_id',
        'valute',
        'sum',
        'return_valute',
        'return',
        'status'
    ];

    public function getUserAttribute()
    {
        $user = User::find($this->user_id);
        return $user;
    }
}
