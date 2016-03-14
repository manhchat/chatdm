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
use App\RaoVatNotLogin;
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
    		$pathImage = RESOURCE_PATH.DS.'tmp';
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
    				echo json_encode(array('flg' => true, 'id' => $insert, 'path' => asset('uploaded/tmp/'.$pathGen.'/'.$newName)));
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
    		$dataImageArr = explode(DS, $dataImage->path);
    		$path = RESOURCE_PATH.DS.'tmp'.DS.$dataImageArr[0];
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
    			'price' => 'required|integer',
    			'name' => 'required|max:100',
    			'phone' => 'required|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
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
    			'price.integer' => 'sdsdsd',
    			'email.email' => trans('post.email_email'),
    			'title.max' => trans('post.title_max'),
    			//'price.max' => trans('post.price_max'),
    			'name.max' => trans('post.name_max'),
    			'phone.max' => 'Số điện thoại bạn nhập không đúng.',
    			'phone.regex' => 'Số điện thoại bạn nhập không đúng.',
    			'email.max' => trans('post.email_max')
    	);
    	$validator = Validator::make(Input::all(),$rules, $messages);
    	if ($validator->fails()) {
    		// get the error messages from the validator
    		$messages = $validator->messages();
    		// redirect our user back to the form with the errors from the validator
    		return redirect('dang-tin')->withErrors($validator)->withInput();
    	} else {
    		$image_ids = Input::get('image');
    		$imgObj = new ImageTmp();
    		$dataImage = $imgObj->getImageTmp($image_ids);
    		
    		
    		$user = ClassesAuth::get();
    		if (!empty($user)) {
    			if (!empty($dataImage)) {
    				$path = RESOURCE_PATH.DS.'images';
    				$pathUserId = $path.DS.$user->id;
    				//Create path user id
    				if (!is_dir($pathUserId)) {
    					mkdir($pathUserId);
    				}
    				//Create path year
    				$pathYear = $pathUserId.DS.date('Y');
    				if (!is_dir($pathYear)) {
    					mkdir($pathYear);
    				}
    				$pathSave = $pathYear.DS.date('m');
    				if (!is_dir($pathSave)) {
    					mkdir($pathSave);
    				}
    				$images = $this->copyImage($dataImage, $pathSave);
    			}
    			$obj = new RaoVat();
    			$data = array(
    					'user_email' => $user->email,
    					'address_id' => Input::get('address_id'),
    					'category_id' => Input::get('category'),
    					'title' => Input::get('title'),
    					'price' => Input::get('price'),
    					'description' => Input::get('description'),
    					'name' => Input::get('name'),
    					'phone' => Input::get('phone'),
    					'email' => Input::get('email'),
    					'image' => json_encode($images),
    					'created' => date('Y-m-d H:i:s'),
    					'updated' => date('Y-m-d H:i:s'),
    					'status' => 0,
    			);
    			$inserted = $obj->createRaoVat($data);
    		} else {
    			if (!empty($dataImage)) {
    				$path = RESOURCE_PATH.DS.'images';
    				$pathUserId = $path.DS.'images_not_login';
    				//Create path user id
    				if (!is_dir($pathUserId)) {
    					mkdir($pathUserId);
    				}
    				//Create path year
    				$pathYear = $pathUserId.DS.date('Y');
    				if (!is_dir($pathYear)) {
    					mkdir($pathYear);
    				}
    				$pathMonth = $pathYear.DS.date('m');
    				if (!is_dir($pathMonth)) {
    					mkdir($pathMonth);
    				}
    				$pathSave = $pathMonth.DS.date('d');
    				if (!is_dir($pathSave)) {
    					mkdir($pathSave);
    				}
    				$images = $this->copyImage($dataImage, $pathSave);
    			}
    			
    			$obj = new RaoVatNotLogin();
    			$data = array(
    					'address_id' => Input::get('address_id'),
    					'category_id' => Input::get('category'),
    					'title' => Input::get('title'),
    					'price' => Input::get('price'),
    					'description' => Input::get('description'),
    					'name' => Input::get('name'),
    					'phone' => Input::get('phone'),
    					'email' => Input::get('email'),
    					'image' => json_encode($images),
    					'created' => date('Y-m-d H:i:s'),
    					'updated' => date('Y-m-d H:i:s'),
    					'status' => 0,
    			);
    			$inserted = $obj->createRaoVat($data);
    		}
    		
    		if ($inserted) {
    			Session::flash('create_raovat_success', 'Bạn đã đăng thành công tin rao vặt. Tin rao vặt của bạn sẽ được chúng tôi xét duyệt trong thời gian sớm nhất.');
    			return redirect('/');
    		}
    	}
    }
    /**
     * Copy image from tmp folder
     * @param string $path
     * @param string $dest
     * @param int $id
     * @return boolean
     */
    private function copyImage($imageArr, $dest)
    {
    	$ids = array();
    	$imagePaths = array();
    	foreach ($imageArr as $key => $value) {
    		$pathImage = RESOURCE_PATH.DS.'tmp'.DS.$value->path;
    		$imageName = explode(DS, $value->path)[1];
    		$pathDest = $dest.DS.$imageName;
    		if (copy($pathImage, $pathDest)) {
    			array_push($ids, $value->id);
    			$pathImageFolderArr = explode(DS, $pathImage);
    			array_pop($pathImageFolderArr);
    			$pathImageFolder = implode(DS, $pathImageFolderArr);
    			Func::deleteFileAndFolder($pathImageFolder);
    			array_push($imagePaths, $imageName);
    		}
    	}
    	$obj = new ImageTmp();
    	$deleted = $obj->deleteImages($ids);
    	if ($deleted) {
    		return $imagePaths;
    	}
    	return false;
    }
    public function validateData()
    {
    	$rules = array(
    			'category'            => 'required',
    			'address_id' => 'required',
    			'title'         => 'required|max:200',
    			'price' => 'required|integer',
    			'name' => 'required|max:100',
    			'phone' => 'required|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
    			'email' => 'required|email|max:100'
    	);
    	if (!ClassesAuth::isAuth()) {
    		$rules['description'] = 'required|tag_a';
    	} else {
    		$rules['description'] = 'required';
    	}
    	$messages = array(
    			'category.required' => trans('post.category_required'),
    			'address_id.required' => trans('post.address_id_required'),
    			'title.required' => trans('post.title_required'),
    			'description.required' => trans('post.description_required'),
    			'price.required' => trans('post.price_required'),
    			'name.required' => trans('post.name_required'),
    			'phone.required' => trans('post.phone_required'),
    			'email.required' => trans('post.email_required'),
    			'price.integer' => 'sdsdsd',
    			'email.email' => trans('post.email_email'),
    			'title.max' => trans('post.title_max'),
    			//'price.max' => trans('post.price_max'),
    			'name.max' => trans('post.name_max'),
    			'phone.max' => 'Số điện thoại bạn nhập không đúng.',
    			'phone.regex' => 'Số điện thoại bạn nhập không đúng.',
    			'email.max' => trans('post.email_max'),
    			'description.tag_a' =>'Bạn chưa đăng nhập nên không thể gắn link trong nội dung tin rao vặt.',
    	);
    	$validator = Validator::make(Input::all(),$rules, $messages);
    	
    	if ($validator->fails()) {
    		// get the error messages from the validator
    		$messages = $validator->messages()->toArray();
    		$_message = array();
    		$field = array();
    		foreach ($messages as $key => $value) {
    			$_message[] = $value[0];
    			$field[] = $key;
    		}
    		echo json_encode(array('flg' => false, 'message' => implode('<br>', $_message), 'field' => $field));
    		exit(); 
    	} else {
    		echo json_encode(array('flg' => true, 'message' => ''));
    		exit();
    	}
    }
}
