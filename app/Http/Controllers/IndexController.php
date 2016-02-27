<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;

class IndexController extends PublicController
{
    /**
     * Home action
     */
	
    public function index()
    {
    	echo $this->get_microtime();
    	return view('home');
    }
    /**
     * DucNV Starting
     * ChatDM comment
     */
}
