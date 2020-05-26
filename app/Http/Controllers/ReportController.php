<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Session;
use App\Teacher;

class ReportController extends Controller
{
    /**
     * Show all sessions of a training.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $report = Report::find($id);
        return view('report', $report);
    }
}
