<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable =[
        'page_no',
        'line_no',
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
