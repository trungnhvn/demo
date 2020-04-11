<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class customer extends Model
{
    use Notifiable;
        protected $fillable = [
            'first_name',
            'last_name',
            'email',
            'city',
            'country',
            'tel'
        ];
}
