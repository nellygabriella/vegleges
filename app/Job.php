<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }   

    public function tags(){

        return $this->belongsToMany('App\Tag');

    }
    
    
}
