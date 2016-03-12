<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App;
use Session;
use App\Classes\Codedef;
use App\Classes\Func;
use Illuminate\Support\Facades\Input;
use Validator;
use App\RaoVat;
use Illuminate\Contracts\Logging\Log;
use App\Classes\ClassesAuth;
use App\ImageTmp;
class PostController extends PublicController
{
    /**
     * Home action
     */
	
    public function index()
    {
    	//Get category
    	$listCategory = Codedef::getID('CATEGORY_LIST');
    	$listCategoryChild = Codedef::getID('CHILD_CATEGORY');
    	$data = array('' => trans('post.select_category'));
    	foreach ($listCategory as $key => $value) {
    		if (isset($listCategoryChild[$value['id']])) {
    			$dataChild = array();
    			foreach ($listCategoryChild[$value['id']] as $k => $v) {
    				$dataChild[$v['id']] = $v['title'];
    				$data[$value['title']] = $dataChild;
    			}
    		}
    	}
    	//Get tinh thanh
    	$listAddress = Codedef::getID('TINH_THANH');
    	$dataTinhThanh = array(
    			'' => trans('post.select_address'),
    			'Miền Bắc' => $listAddress['MIEN_BAC'],
    			'Miền Trung' => $listAddress['MIEN_TRUNG'],
    			'Miền Nam' => $listAddress['MIEN_NAM']
    	);
    	$user = ClassesAuth::get();
    	return view('post/index', array('listCategory' => $data, 'dataTinhThanh' => $dataTinhThanh, 'user' => $user));
    }
    
    public function upload()
    {
    	$file = Input::file('image');
    	if ($file->isValid()) {
    		$extension = $file->getClientOriginalExtension();
    		$pathImage = RESOURCE_PATH.DS.'image';
    		$pathGen = md5(uniqid().microtime());
    		$pathCreated = $pathImage.DS.$pathGen;
    		if (mkdir($pathCreated)) {
    			$newName = uniqid().'.'.$extension;
    			$pathNewImage = $pathCreated.DS.$newName;
    			$uploaded = Func::uploadImage($file->getPathName(), $pathNewImage);
    			//Insert to image_tmp table
    			if ($uploaded) {
    				$pathInsert = $pathGen.DS.$newName;
    				
    				$obj = new ImageTmp();
    				$data = array(
    						'path' => $pathInsert,
    						'created' => date('Y-m-d H:i:s')
    				);
    				$insert = $obj->insertImageTmp($data);
    				echo json_encode(array('flg' => true, 'id' => $insert, 'path' => asset('uploaded/image/'.$pathGen.'/'.$newName)));
    				exit();
    			}
    		}
    		
    	}
    	
    }
    
    public function removeImage()
    {
    	$id = Input::get('id');
    	$obj = new ImageTmp();
    	$dataImage = $obj->getDataImageTmp($id);
    	if (!empty($dataImage) && $dataImage != false) {
    		$dataImageArr = explode("\\", $dataImage->path);
    		$path = RESOURCE_PATH.DS.'image'.DS.$dataImageArr[0];
    		if (Func::deleteFileAndFolder($path)) {
    			$obj->deleteImageTmp($dataImage->id);
    			echo json_encode(array('flg' => true));
    			exit();
    		}
    	}
    }
    
    public function create()
    {
    	$rules = array(
    			'category'            => 'required',
    			'address_id' => 'required',
    			'title'         => 'required|max:200',
    			'description' => 'required',
    			'price' => 'required|max:200',
    			'name' => 'required|max:100',
    			'phone' => 'required|max:11',
    			'email' => 'required|email|max:100'
    	);
    	$messages = array(
    			'category.required' => trans('post.category_required'),
    			'address_id.required' => trans('post.address_id_required'),
    			'title.required' => trans('post.title_required'),
    			'description.required' => trans('post.description_required'),
    			'price.required' => trans('post.price_required'),
    			'name.required' => trans('post.name_required'),
    			'phone.required' => trans('post.phone_required'),
    			'email.required' => trans('post.email_required'),
    			'email.email' => trans('post.email_email'),
    			'title.max' => trans('post.title_max'),
    			'price.max' => trans('post.price_max'),
    			'name.max' => trans('post.name_max'),
    			'phone.max' => trans('post.phone_max'),
    			'email.max' => trans('post.email_max')
    	);
    	$validator = Validator::make(Input::all(),$rules, $messages);
    	if ($validator->fails()) {
    		// get the error messages from the validator
    		$messages = $validator->messages();
    		// redirect our user back to the form with the errors from the validator
    		return redirect('dang-tin')->withErrors($validator)->withInput();
    	} else {
    		$obj = new RaoVat();
    		$user = ClassesAuth::get();
    		$data = array(
    				'user_email' => $user->email,
    				'address_id' => Input::get('address_id'),
    				'category_id' => Input::get('category_id'),
    				'title' => Input::get('title'),
    				'price' => Input::get('price'),
    				'description' => Input::get('description'),
    				'name' => Input::get('name'),
    				'phone' => Input::get('phone'),
    				'email' => Input::get('email'),
    				'image1' => Input::get('image1'),
    				'image2' => Input::get('image2'),
    				'image3' => Input::get('image3'),
    				'image4' => Input::get('image4'),
    				'created' => date('Y-m-d H:i:s'),
    				'updated' => date('Y-m-d H:i:s'),
    				'status' => 0,
    		);
    		$inserted = $obj->createRaoVat($data);
    		if ($inserted) {
    			Session::flash('create_raovat_success', 'Bạn đã đăng thành công tin rao vặt. Tin rao vặt của bạn sẽ được chúng tôi xét duyệt trong thời gian sớm nhất.');
    			return redirect('rao-vat');
    		}
    	}
    }
    
    public function validateData()
    {
    	$rules = array(
    			'category'            => 'required',
    			'address_id' => 'required',
    			'title'         => 'required|max:200',
    			'description' => 'required',
    			'price' => 'required|max:200',
    			'name' => 'required|max:100',
    			'phone' => 'required|max:11',
    			'email' => 'required|email|max:100'
    	);
    	$messages = array(
    			'category.required' => trans('post.category_required'),
    			'address_id.required' => trans('post.address_id_required'),
    			'title.required' => trans('post.title_required'),
    			'description.required' => trans('post.description_required'),
    			'price.required' => trans('post.price_required'),
    			'name.required' => trans('post.name_required'),
    			'phone.required' => trans('post.phone_required'),
    			'email.required' => trans('post.email_required'),
    			'email.email' => trans('post.email_email'),
    			'title.max' => trans('post.title_max'),
    			'price.max' => trans('post.price_max'),
    			'name.max' => trans('post.name_max'),
    			'phone.max' => trans('post.phone_max'),
    			'email.max' => trans('post.email_max')
    	);
    	$validator = Validator::make(Input::all(),$rules, $messages);
    	if ($validator->fails()) {
    		// get the error messages from the validator
    		$messages = $validator->messages()->toArray();
    		$_message = array();
    		foreach ($messages as $key => $value) {
    			$_message[] = $value[0];
    		}
    		echo json_encode(array('flg' => false, 'message' => implode('<br>', $_message)));
    		exit(); 
    	} else {
    		echo json_encode(array('flg' => true, 'message' => ''));
    		exit();
    	}
    }

}
