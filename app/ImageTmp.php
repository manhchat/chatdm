<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ImageTmp extends Model
{
    //
    protected $table = 'image_tmp';
    
    public function insertImageTmp($data)
    {
    	$inserted = DB::table($this->table)->insertGetId($data);
    	return $inserted;
    }
    
    /**
     * Get image uploaded
     * 
     * @param string $id
     * @return boolean
     */
    public function getDataImageTmp($id='')
    {
    	if ($id == '') {
    		return false;
    	}
    	$data = DB::table($this->table)
	    	->select()
	    	->where('id', '=', $id)->first();
    	return $data;
    }
    
    public function deleteImageTmp($id='')
    {
    	if ($id == '') {
    		return false;
    	}
    	return DB::table($this->table)->where('id', '=', $id)->delete();
    }
    /**
     * 
     * @param string $id
     * @return boolean
     */
    public function deleteImages($ids='')
    {
    	if (empty($ids)) {
    		return false;
    	}
    	return DB::table($this->table)->whereIn('id', $ids)->delete();
    }
    /**
     * Get image uploaded
     *
     * @param string $id
     * @return boolean
     */
    public function getImageTmp($ids=array())
    {
    	if (empty($ids)) {
    		return array();
    	}
    	$data = DB::table($this->table)
	    	->select()
	    	->whereIn('id', $ids)->get();
    	return $data;
    }
}
