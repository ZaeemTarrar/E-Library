<?php

        namespace App;

        use Illuminate\Notifications\Notifiable;
        use Illuminate\Foundation\Auth\User as Authenticatable;
        use App\Notifications\ResetPassword as ResetPasswordNotification;

        class User extends Authenticatable
        {
            use Notifiable;

            /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected $fillable = ['name', 'email', 'password', 'role_id','first_name','last_name','contact_number','about','dob','gender','snap'];
            protected $hidden = [
                'password', 'remember_token',
            ];
            public function role(){return $this->belongsTo('App\Role');}public function notifications(){return $this->hasMany('App\Notification');}

            /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            public function sendPasswordResetNotification($token)
            {
                // Your your own implementation.
                $this->notify(new ResetPasswordNotification($token));
            }
        }



