<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * Get the teacher that has the session.
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'teacher_id');
    }

    /**
     * Get the teacher that has the session.
     */
    public function session()
    {
        return $this->belongsTo('App\Session', 'training_id', 'id');
    }


    public static function boot() {
        parent::boot();
        self::deleting(function($training) { 
             $training->session()->each(function($session) {
                $session->report()->each(function($report) {
                    $report->forceDelete(); 
                });
                $session->grades()->each(function($grade) {
                    $grade->forceDelete(); 
                });
                $session->forceDelete(); 
             });
        });
    }
}
