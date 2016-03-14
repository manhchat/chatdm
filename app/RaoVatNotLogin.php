<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Contracts\Logging\Log;

class RaoVatNotLogin extends Model
{
    //
    protected $table = 'raovat_not_login';
    
    /**
     * Create tin rao vat
     */
    public function createRaoVat($data = array())
    {
    	try {
    		if (empty($data)) {
    			return false;
    		}
    		$inserted = DB::table($this->table)->insert($data);
    		return $inserted;
    		
    	} catch (Exception $e) {
    		Log::error($e);
    		throw new Exception($e->getMessage(), $e->getCode());
    	}
    	
    }
}
