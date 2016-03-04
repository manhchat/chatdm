<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends PublicController
{
	/**
	 * dang ky tk
	 */
	public function index()
	{
		return view('register/index');
	}
	
	public function register()
	{
		//Khai bao kiem tra du lieu vao day gan giong voi cai login
		$rules = array(
			'email' => 'required|email|max:100',
			'password' => 'required|min:6|confirmed',
				//Do nó so sánh confirmed nên ko cần khai báo pasowrd confirmation
		) ;
		$messages = array(
			'email.required' => trans('login.login_please_input_email'),
			'email.email' => trans('login.login_format_email'),
			'email.max' => trans('login.login_max_email'),
			'password.required' => trans('login.login_please_input_password'),
			'password.min' => trans('login.login_input_password_incorrect'),
			'password.confirmed' => trans('login.login_please_input_password_confirm'),
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails()) {
			//Thu echo xem no chay vao day chua
			// get tho error messages from the validator
			$messages = $validator->messages();
			return redirect('dang-ky')->withErrors($validator)->withInput(Input::except('password'));
		} else {
			//Chỗ này ngày mai sẽ làm insert vào bảng token
		}
	}
}