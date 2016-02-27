<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;

class RegisterController extends PublicController
{
	/**
	 * dang ky tk
	 */
	public function index()
	{
		return view('register/index');
	}
}