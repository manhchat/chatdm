<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;
use App\Classes\Codedef;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Session;
use App\Classes\Auth;
use App\Classes\ClassesAuth;
class LoginController extends PublicController
{
    /**
     * Home action
     */
	
    public function index()
    {
    	
    	return view('login/index');
    }
    
    public function logon()
    {
    	$rules = array(
    			'email'            => 'required|email|max:100',     // required and must be unique in the ducks table
    			'password'         => 'required',
    	);
    	$messages = array(
    			'email.required' => trans('login.login_please_input_email'),
    			'email.email' => trans('login.login_format_email'),
    			'email.max' => trans('login.login_max_email'),
    			'password.required' => trans('login.login_please_input_password'),
    	);
    	$validator = Validator::make(Input::all(),$rules, $messages);
    	if ($validator->fails()) {
    		// get the error messages from the validator
    		$messages = $validator->messages();
    		// redirect our user back to the form with the errors from the validator
    		return redirect('dang-nhap')->withErrors($validator)->withInput(Input::except('password'));
    	} else {
    		$obj = new User();
    		$user = $obj->loginUser(Input::get('email'), Input::get('password'));
    		if ($user) {
    			ClassesAuth::set($user);
    			return redirect('/');
    		} else {
    			
    		}
    	}
    }
    
    public function logout()
    {
    	ClassesAuth::logout();
    	return redirect('/');
    }
}
