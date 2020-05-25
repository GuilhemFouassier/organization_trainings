<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;

class TrainingController extends Controller
{
    /**
     * Show all trainings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trainings = Training::with('user')->get();
        return view('trainings', ['trainings'=>$trainings]);
    }
}
