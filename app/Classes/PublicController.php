<?php

namespace App\Classes;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App;

class PublicController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
    }
}
