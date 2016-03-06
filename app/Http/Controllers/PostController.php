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
    	$listCategory = Func::arraySigle($listCategory, 'id', 'title');
    	$listCategory[''] = trans('post.select_category');
    	ksort($listCategory);
    	return view('post/index', array('listCategory' => $listCategory));
    }
    
    public function childCategory()
    {
    	$category_id = Input::get('category_id');
    	if ($category_id != '') {
    		$listCategory = Codedef::getID('CHILD_CATEGORY');
    		if (isset($listCategory[$category_id]) && !empty($listCategory[$category_id])) {
    			$data = array(
    					'hit' => count($listCategory[$category_id]),
    					'list' => $listCategory[$category_id]
    			);
    			echo json_encode($data);
    			exit();
    		} else {
    			$data = array(
    					'hit' => 0,
    					'list' => []
    			);
    			echo json_encode($data);
    			exit();
    		}
    	}
    }
    
    public function create()
    {
    	
    }

}
