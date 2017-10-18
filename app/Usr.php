<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usr extends Authenticatable
{
	use Notifiable;

    protected $table = 'users';
    const CREATED_AT = 'act_created';
    const UPDATED_AT = 'last_login';
}
