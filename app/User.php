<?php

        namespace App;
        
        use Illuminate\Notifications\Notifiable;
        use Illuminate\Foundation\Auth\User as Authenticatable;
        
        class User extends Authenticatable
        {
            use Notifiable;

            /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected $fillable = ['name', 'email', 'password', 'role_id'];
            protected $hidden = [
                'password', 'remember_token',
            ];
            public function role(){return $this->belongsTo('App\Role');}public function notifications(){return $this->hasMany('App\Notification');}
        }
        
        