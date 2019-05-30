<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =[
        'name',
        'author',
        'file',
        'recommendation',
        'pages',
        'active',
        'grade_id',
        'language_id',
        'category_id',
        'user_id'
    ];

    public function grade()
    {
        return $this->hasOne('App\Grade');
    }

    public function language()
    {
        return $this->hasOne('App\Language');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function views()
    {
        return $this->hasMany('App\View');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }


}
