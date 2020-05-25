<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * Report and session relation
     */

    public function session()
    {
        return $this->belongsTo('App\Session','session_id', 'id');
    }

    /**
     * Report and teacher relation
     */

    public function user()
    {
        return $this->belongsTo('App\User','teacher_id', 'id');
    }
}
