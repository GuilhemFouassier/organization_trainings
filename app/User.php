<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'date_of_birth', 'gender', 'job','password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the training of the session.
     */
    public function reports() 
    {
        return $this->hasMany('App\Report', 'teacher_id', 'id');
    }

    /**
     * Get the teacher that has the session.
     */
    public function training()
    {
        return $this->belongsTo('App\Training');
    }

    /**
     * Get the teacher that has the session.
     */
    public function grades()
    {
        return $this->hasMany('App\Grade', 'user_id', 'id');
    }

}
