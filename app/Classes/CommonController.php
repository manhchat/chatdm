<?php

namespace App\Classes;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class CommonController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Func;
    public function __construct()
    {
    	ClassesAuth::updateExprire(SESSION_LIFETIME);
    }
}
