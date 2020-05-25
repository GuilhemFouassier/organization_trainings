<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * Get the teacher that has the session.
     */
    public function session()
    {
        return $this->belongsTo('App\Session');
    }
}
