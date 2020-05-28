<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * Grade and session relation
     */

    public function session()
    {
        return $this->belongsTo('App\Session', 'session_id', 'id');
    }

    /**
     * Grade and user relation
     */

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
