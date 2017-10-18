<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admn extends Authenticatable
{
    use Notifiable;

    protected $guard = 'jp_admin';
	
	protected $table = 'users';
    const CREATED_AT = 'act_created';
    const UPDATED_AT = 'last_login';    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
