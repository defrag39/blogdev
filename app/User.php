<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lpl',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'peng12';
    protected $primaryKey = 'idpengguna';
    public function isAdmin()
{
    return $this->lpl; // this looks for an admin column in your users table
}
    public function blog(){
      return $this->hasMany('App\Blog');
    }
}
