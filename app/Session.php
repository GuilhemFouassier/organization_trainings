<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    /**
     * Get the room that has the session.
     */
    public function room()
    {
        return $this->hasOne('App\Room', 'id', 'room_id');
    }

    /**
     * Get the training of the session.
     */
    public function training()
    {
        return $this->hasOne('App\Training', 'id','training_id');
    }

    /**
     * Get the training of the session.
     */
    public function report() 
    {
        return $this->hasOne('App\Report', 'session_id', 'id');
    }

    /**
     * Get the grades of the session.
     */
    public function grades()
    {
        return $this->hasMany('App\Grade', 'session_id', 'id');
    }
/**
     * Get the teacher that has the session.
     */
    public function session()
    {
        return $this->belongsTo('App\Session', 'training_id', 'id');
    }

    
}
