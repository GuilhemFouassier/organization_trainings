<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\User;
use App\Report;

class TeacherController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('CheckTeacherRole');
    }

    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sessions = Session::all()->get();
        $users = User::where('role', 'teacher')->get();
        return view('add_report', ['sessions'=>$sessions], ['users'=>$users]);
    }

    /**
     * Add report.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_report($id, Request $request)
    {
        $session = Session::find($id);
        $users = User::where('role', 'teacher')->get();
        return view('add_report', ['session'=>$session], ['users'=>$users]);
    }

    /**
     * Create Report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_report($id, Request $request)
    {
        $report = new Report;
        $report->name = $request->name;
        $report->content = $request->content;
        $report->session_id = $id;
        $report->teacher_id = $request->teacher_id;
        $report->save();

        return redirect()->action('ReportController@index', ['id'=>$id]);
    }

    /**
     * Edit a report .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_report($id, Request $request)
    {
        $session = Session::find($id);
        $report = Report::where('session_id', $id)->first();
        $users = User::where('role', 'teacher')->first();
        return view('edit_report')->with(compact('report', 'session', 'users'));
    }

    /**
     * Update the report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_report($id, Request $request)
    {
        $report = Report::where('session_id', $id)->first();
        $report->name = $request->name;
        $report->content = $request->content;
        $report->session_id = $id;
        $report->teacher_id = $request->teacher_id;
        $report->save();

        return redirect()->action('ReportController@index', ['id'=>$id]);
    }

    /**
     * Delete Report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_report($id)
    {
        $report = Report::where('session_id', $id)->first();
        $report->forceDelete();
        return redirect()->action('ReportController@index', ['id'=>$id]);
    }
}
