<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Model
{
    //
    protected $table = 'user';
    
    /**
     * Login
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function loginUser($email, $password)
    {
    	if ($email == '' || $password == '') {
    		return false;
    	}
    	$users = DB::table($this->table)
    				->select()
    				->where('email', '=', $email)
    				->where('password', '=', md5($password))->first();
    	return $users;
    }
}
