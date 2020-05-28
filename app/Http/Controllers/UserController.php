<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Session;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('CheckUserRole');
    }

    /**
     * Show all trainings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registration($id)
    {
        $grade = new Grade;
        $grade->session_id = $id;
        $grade->user_id = \Auth::user()->id;
        $grade->save();
        $session = Session::find($id);
        $session->availables_seats = (($session->availables_seats) - 1);
        $session->save();
        return redirect()->action('TrainingController@index');
    }

}
