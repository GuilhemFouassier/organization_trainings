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
        return view('sessions',['training'=>$training], ['sessions'=>$sessions]);
    }

    /**
     * View all sessions of a training.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function all_sessions()
    {
        $sessions = Session::all();
        return view('all_sessions', ['sessions'=>$sessions]);
    }

    /**
     * View all passed sessions of a training.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function passed_sessions()
    {
        $sessions = Session::all();
        return view('passed_sessions', ['sessions'=>$sessions]);
    }

    /**
     * View all sessions to come of a training.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sessions_to_come()
    {
        $sessions = Session::all();
        return view('sessions_to_come', ['sessions'=>$sessions]);
    }
}
