<?php

        namespace App;
        
        use Illuminate\Database\Eloquent\Model;
        
        class Notificationtype extends Model
        {
            protected $fillable = ['name'];
        public function notifications(){return $this->hasMany('App\Notification');}
        }
        
        