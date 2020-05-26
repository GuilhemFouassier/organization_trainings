<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Report;
use App\Session;
use App\Teacher;

class ReportController extends Controller
{
    /**
     * Show the report of a session.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $reports = Report::where('session_id', $id)->get();
        $sessions = Session::find($id);
        return view('report', ['sessions'=>$sessions], ['reports'=>$reports]);


        $session = Session::find($id);
        $reports = Report::all();

        if($reports->session_id == $id)
            return view('reports', ['reports'=>$reports]);
        else
            die('aucun compte-rendu pour cette session');
    }
}
