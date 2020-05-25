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
        return $this->belongsTo('App\Session', 'id', 'session_id');
    }

    /**
     * Grade and user relation
     */

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
