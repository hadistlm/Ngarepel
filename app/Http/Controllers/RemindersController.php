<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ReminderEvent;
use App\Http\Requests\ReminderRequest;
use App\User;
use Event, Session, Sentinel, Reminder;

class RemindersController extends Controller
{
	public function create()
	{
		return view('auth.recovery.create');
	}

	public function store(Request $request)
	{
		$user = User::where('email', $request->email)->first();

		if ($user) {
			$data = Sentinel::findById($user->id);
			($reminder = Reminder::exists($data)) || ($reminder = Reminder::create($data));
			Event::fire(new ReminderEvent($data, $reminder));
			Session::flash('warning', "Please Open Your E-mail For next instructions");
		}else{
			Session::flash('error', "E-mail not valid");
		}

		return view('auth.recovery.create');
	}

	public function edit($id, $code)
	{
		$user = Sentinel::findById($id);

		if (Reminder::exists($user, $code)) {
			return view('auth.recovery.store',['id'=>$id, 'code'=>$code]);
		} else {
			return redirect('/');
		}
	}

	public function update(ReminderRequest $request, $id, $code)
	{
		$user = Sentinel::findById($id);
		$reminder = Reminder::exists($user, $code);

		if ($reminder) {
		 	Session::flash('notice', "Your Password Success Changed");
		 	Reminder::complete($user, $code, $request->password);
		 	return redirect('login');
		 } else {
		 	Session::flash('error', "password must match");
		 }
		  
	}
}
