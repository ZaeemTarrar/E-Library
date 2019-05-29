<?php

        namespace App;
        
        use Illuminate\Database\Eloquent\Model;
        
        class Notification extends Model
        {
            protected $fillable = ['message', 'status', 'user_id', 'notificationtype_id'];
        public function user(){return $this->belongsTo('App\User');}public function notificationtype(){return $this->belongsTo('App\Notificationtype');}
        }
        
        