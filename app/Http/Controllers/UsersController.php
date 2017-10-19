<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Session, Sentinel;

class UsersController extends Controller
{
    public function signup()
    {
    	return view('auth.signup');
    }

    public function signup_store(UserRequest $request)
    {
    	$input = [
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
    		'email' => $request->email,
    		'password' => $request->password
    	];
        $writerrole = Sentinel::findRoleByName('Writer');

    	try {
    		$added = Sentinel::registerAndActivate($input);
            $added->roles()->attach($writerrole);

			Session::flash('notice', 'Please Login To Start Your session');	
    		return redirect('/');
    	} catch (Exception $e) {
    		Session::flash('errors', $e);	
    		return redirect()->back();
    	}
    }
}
