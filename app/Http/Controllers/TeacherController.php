<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\User;
use App\Report;
use App\Grade;

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
     * Add report.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_report($id)
    {
        $report = Report::find($id);
        return view('add_report', ['report'=>$report]);
    }

    /**
     * Create Report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_report($id, Request $request)
    {
        $report = Report::find($id);
        $report->name = $request->name;
        $report->content = $request->content;
        $report->save();

        return redirect()->action('ReportController@index', ['id'=>$id]);
    }

    /**
     * Edit a report .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_report($id)
    {
        $report = Report::find($id);
        return view('edit_report', ['report'=>$report]);
    }

    /**
     * Update the report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_report($id, Request $request)
    {
        $report = Report::find($id);
        $report->name = $request->name;
        $report->content = $request->content;
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
        $report = Report::find($id);
        $report->name = null;
        $report->content = null;
        $report->save();
        return redirect()->action('SessionController@index', ['id'=>$report->session->training_id]);
    }

    /**
     * Add grade to a user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_grade($id)
    {
        $grade = Grade::with('session.grades', 'user.grades')->where(array('id'=>$id))->get();
        return view('add_grade', ['grade'=>$grade]);
    }

    /**
     * Create Report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_grade($id, Request $request)
    {
        $grade = Grade::find($id);
        $grade->value = $request->value;
        $grade->save();

        return redirect()->action('SessionController@passed_sessions');
    }

    /**
     * Add grade to a user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_grade($id)
    {
        $grade = Grade::with('session.grades', 'user.grades')->where(array('id'=>$id))->get();
        return view('edit_grade', ['grade'=>$grade]);
    }

    /**
     * Create Report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_grade($id, Request $request)
    {
        $grade = Grade::find($id);
        $grade->value = $request->value;
        $grade->save();

        return redirect()->action('SessionController@passed_sessions');
    }

    /**
     * Delete Report in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_grade($id)
    {
        $grade = Grade::find($id);
        $grade->value = null;
        $grade->save();
        return redirect()->action('SessionController@passed_sessions');
    }

}
