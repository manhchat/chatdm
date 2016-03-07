<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;
use Session;
use App\Classes\Codedef;
use App\Classes\Func;
use Illuminate\Support\Facades\Input;
class PostController extends PublicController
{
    /**
     * Home action
     */
	
    public function index()
    {
    	$listCategory = Codedef::getID('CATEGORY_LIST');
    	$listCategoryChild = Codedef::getID('CHILD_CATEGORY');
    	$data = array();
    	foreach ($listCategory as $key => $value) {
    		if (isset($listCategoryChild[$value['id']])) {
    			$dataChild = array();
    			foreach ($listCategoryChild[$value['id']] as $k => $v) {
    				$dataChild[$v['id']] = $v['title'];
    				$data[$value['title']] = $dataChild;
    			}
    		}
    	}
    	return view('post/index', array('listCategory' => $data));
    }
    
    public function upload()
    {
    	$file = Input::file('image');
    	echo json_encode(array('true' => 'true'));
    }
    
    public function create()
    {
    	echo "<pre>";
    	var_dump(Input::all());
    	var_dump(Input::file());
    }

}
