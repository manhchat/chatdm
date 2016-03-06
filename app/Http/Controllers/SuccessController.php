<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;

class SuccessController extends PublicController
{
	public function index()
	{
		return view('success/index');
	}
}
