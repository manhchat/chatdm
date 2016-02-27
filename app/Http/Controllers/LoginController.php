<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;

class LoginController extends PublicController
{
    /**
     * Home action
     */
	
    public function index()
    {

    	return view('login/index');
    }
}
