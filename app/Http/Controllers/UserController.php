<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
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
        return redirect()->action('TrainingController@index');
    }

}
