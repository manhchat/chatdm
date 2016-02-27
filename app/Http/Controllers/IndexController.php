<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;

class IndexController extends PublicController
{
    
    public function index()
    {
    	return view('home');
    }
}
