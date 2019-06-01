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
        return $this->belongsTo('App\Grade');
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
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
