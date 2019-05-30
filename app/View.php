<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function book()
    {
        return $this->hasOne('App\Book');
    }
}
