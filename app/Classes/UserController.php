<?php

namespace App\Classes;

class UserController extends CommonController
{
    public function __construct()
    {
    	ClassesAuth::updateExprire(SESSION_LIFETIME);
    }
}
