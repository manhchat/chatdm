<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;
use Session;
use App\Classes\Codedef;
use App\Classes\Func;
use Illuminate\Support\Facades\Input;
use Validator;
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
    	$rules = array(
    			'category'            => 'required',     // required and must be unique in the ducks table
    			'title'         => 'required',
    			'description' => 'required',
    			'price' => 'required',
    			'name' => 'required',
    			'phone' => 'required',
    			'email' => 'required|email'
    	);
    	$messages = array(
    			'category.required' => 'Hãy chọn danh mục rao vặt.',
    			'title.required' => 'Hãy nhập tiêu đề.',
    			'description.required' => 'Hãy nhập nội dung rao vặt.',
    			'price.required' => 'Hãy nhập giá.',
    			'name.required' => 'Hãy nhập tên của bạn.',
    			'phone.required' => 'Hãy nhập số điện thoại của bạn.',
    			'email.required' => 'Hãy nhập số email của bạn.',
    			'email.email' => 'Địa chỉ email của bạn không đúng.'
    	);
    	$validator = Validator::make(Input::all(),$rules, $messages);
    	if ($validator->fails()) {
    		// get the error messages from the validator
    		$messages = $validator->messages();
    		// redirect our user back to the form with the errors from the validator
    		return redirect('dang-tin')->withErrors($validator)->withInput();
    	} else {
    	}
    }

}
