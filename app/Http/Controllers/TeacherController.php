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
}
