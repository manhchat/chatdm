<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Token;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

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
			'email' => 'required|email|max:100|unique:token,email|unique:user,email',
			'password' => 'required|min:6|confirmed',
				//Do nó so sánh confirmed nên ko cần khai báo pasowrd confirmation
		) ;
		$messages = array(
				'email.required' => trans('login.login_please_input_email'),
				'email.email' => trans('login.login_format_email'),
				'email.max' => trans('login.login_max_email'),
				'email.unique' => 'Email này đã được đăng ký.',
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
			//Khởi tạo đối tượng token
			$obj = new Token();
			//Data là mảng các tham số nhập trên màn hình
			$token = md5(uniqid());
			$data = array(
					'email' => Input::get('email'),
					'password' => md5(Input::get('password')),
					'token' => $token,
					'created' => date('Y-m-d H:i:s')
			);
			$insert = $obj->insertToken($data);
			//Sau khi insert token xong thi gui mail thong bao den user
			if ($insert != false) {
				//Neu insert thanh cong thi gui mail
				//Viet code gui mail vao day
				
				$data = array (
						'email' => Input::get('email'),
						'url_active' => url('/').'/kich-hoat/token/'.$token,
						'website' => url('/'),
				);
				
				Mail::send('mail.create-account', $data, function ($message) {
					
					$message->from('hotrolaptop.com@gmail.com', 'Banlai.com');
					$message->to(Input::get('email'))->subject('Kích hoạt tài khoản');
				});
				return redirect('thanh-cong');
			}
		}
	}
}