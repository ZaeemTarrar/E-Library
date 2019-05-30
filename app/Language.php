<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'active',
    ];


    public function books()
    {
        return $this->hasMany('App\Book');
    }

}
