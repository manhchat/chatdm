<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Token extends Model
{
	protected $table = 'token';
	
	public function insertToken($data=array())
	{
		$inserted = DB::table($this->table)->insert($data);
		return $inserted;
	}
	
	public function updateToken($data, $where)
	{
		$update = DB::table($this->table)
					->where($where)
					->update($data);
		
	}
	
	public function getToken($token)
	{
		$tokenArray = DB::table($this->table)
					->select()
					->where('token','=',$token)
					->first();
		return $tokenArray;
	}
	
	public function deleteToken($id)
	{
		return DB::table($this->table)->where('id', '=', $id)->delete();
	}
	
}
