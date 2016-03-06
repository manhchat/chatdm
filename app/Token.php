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
}
