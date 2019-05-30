<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
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
