<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Training;
Use App\Room;
Use App\Session;
Use App\Report;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('CheckAdminRole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        $users = User::all();
        return view('users', ['users'=>$users]);
    }

    /**
     * Go to page add_user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_user()
    {
        return view('add_user');
    }

    /**
     * Create User in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_user(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->job = $request->job;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users');
    }

    /**
     * Edit an user .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_user($id)
    {
        $user = User::find($id);
        return view('edit_user', ['user' => $user]);
    }

    /**
     * update the user in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_user($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->job = $request->job;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('users');
    }

    /**
     * Delete an user .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users');
    }

    /**
     * Go to page add_training.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_training()
    {
        $users = User::where('role', 'teacher')->get();
        return view('add_training', ['users'=>$users]);
    }

    /**
     * Create Training in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_training(Request $request)
    {
        $training = new Training;
        $training->name = $request->name;
        $training->duration = $request->duration;
        $training->teacher_id = $request->teacher_id;
        $training->save();
        return redirect()->route('trainings');
    }

    /**
     * Edit a training .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_training($id)
    {
        $training = Training::find($id);
        $users = User::where('role', 'teacher')->get();
        return view('edit_training', ['users' => $users], ['training'=> $training]);
    }

    /**
     * update the training in database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_training($id, Request $request)
    {
        $training = Training::find($id);
        $training->name = $request->name;
        $training->duration = $request->duration;
        $training->teacher_id = $request->teacher_id;
        $training->save();
        return redirect()->route('trainings');
    }

    /**
     * Delete a training .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_training($id)
    {
        $training = Training::find($id);
        $training->delete();
        return redirect()->route('trainings');
    }

    /**
     * Go to page create_session.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_session($id, Request $request)
    {
        $training = Training::find($id);
        $users = User::where('role', 'teacher')->get();
        $rooms = Room::all();
        return view('add_session')->with(compact('training', 'users', 'rooms'));
    }

    /**
     * Create Session in database.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_session($id, Request $request)
    {
        $session = new Session;
        $session->name = $request->name;
        $session->date = $request->date;
        $session->availables_seats = $request->availables_seats;
        $session->configuration = $request->configuration;
        $session->room_id = $request->room_id;
        $session->training_id = $id;
        $session->save();
        $report = new Report;
        $report->session_id = $session->id;
        $report->teacher_id = $request->teacher_id;
        $report->save();
        return redirect()->action('SessionController@index', ['id'=>$id]);
    }

    /**
     * Edit Session in database.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_session($id, Request $request)
    {
        $session = Session::find($id);
        $users = User::where('role', 'teacher')->get();
        $rooms = Room::all();
        return view('edit_session')->with(compact('session', 'users', 'rooms'));
    }

    /**
     * Update Session in database.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_session($id, Request $request)
    {
        $session = Session::find($id);
        $session->name = $request->name;
        $session->date = $request->date;
        $session->availables_seats = $request->availables_seats;
        $session->configuration = $request->configuration;
        $session->room_id = $request->room_id;
        $session->save();
        $report = Report::all()->where('session_id', $id)->first();
        $report->teacher_id = $request->teacher_id;
        $report->save();
        return redirect()->action('SessionController@index', ['id'=>$session->training_id]);
    }

    /**
     * Delete Session in database.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_session($id)
    {
        $report = Report::all()->where('session_id', $id)->first();
        $report->forceDelete();
        $session = Session::find($id);
        $session->delete();
        return redirect()->route('trainings');
    }
}
