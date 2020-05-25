<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Training;

class SessionController extends Controller
{
    /**
     * Show all sessions of a training.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $sessions = (Session::with('report.user')->where(array('training_id'=>$id))->get());
        $training = Training::find($id);
        return view('sessions', ['sessions'=>$sessions], ['training'=>$training]);
    }
}
