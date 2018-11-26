<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function news()
    {
        return $this->belongsToMany('App\News');
    }

    public function project()
    {
        return $this->belongsToMany('App\Project');
    }
}
