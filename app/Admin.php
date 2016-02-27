<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Admin extends Model
{
    //
    protected $table = 'admin';
    public static $rules = array(
    		'username'=>'required',
    		'password'=>'required',
    );
    
    public function getTest()
    {
    	$users = DB::table('admin')->select('id', 'username')->get();
    	return $users;
    }
}
