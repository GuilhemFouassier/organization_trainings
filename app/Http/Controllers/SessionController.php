<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Training;
use App\Grade;

class SessionController extends Controller
{
    /**
     * Show all sessions of a training.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $sessions = (Session::with('report.user', 'grades.user')->where(array('training_id'=>$id))->get());
        $training = Training::find($id);
        return view('sessions', ['sessions'=>$sessions], ['training'=>$training]);
    }
}
