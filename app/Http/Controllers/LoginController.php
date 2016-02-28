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
    			'email.required' => 'Hãy nhập địa chỉ email.',
    			'email.email' => 'Email không đúng định dạng.',
    			'email.max' => 'Email vượt quá ký tự cho phép là 100',
    			'password.required' => 'Hãy nhập password.',
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
    			Session::set('loginUser', $user);
    			return redirect('/');
    		} else {
    			
    		}
    	}
    }
}
