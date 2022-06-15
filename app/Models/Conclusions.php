<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conclusions extends Model
{
    use HasFactory;

    protected $table = 'conclusions';

    protected $fillable = [
        'valute',
        'sum',
        'return_valute',
        'return',
    ];

    public function getUserAttribute()
    {
        $user = User::find($this->user_id);
        return $user;
    }
}
