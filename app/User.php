<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public function news(){
        return $this->hasMany('App\News');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function jobs(){
        return $this->hasMany('App\Job');
    }

    public function notes(){
        return $this->hasMany('App\Note');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
