<?php

namespace App\Http\Controllers;

use App\Classes\PublicController;
use App\Token;
use App\User;
use App;

class ActiveController extends PublicController
{
	public function index($token)
	{
		//$token gia tri cua thằng này sẽ được get từ Url trên Url truyền aa => ra aaa
		$obj = new Token();
		$tokenResult = $obj->getToken($token);
		if (!empty($tokenResult)) {
			//Insert data da get duoc vao bang user
			$data = array(
					'email' => $tokenResult->email,
					'password' => $tokenResult->password,
					'created' => date('Y-m-d H:i:s'),
					//Cai nay la get ra current time 2016-03-09 09:41:50
			);
			//Viet vao day
			$objUser = new User();
			$insert = $objUser->insertUser($data);
			if ($insert) {
				//Sau khi insert data cua token vao user roi thi xoa cai token do di
				$obj->deleteToken($tokenResult->id);
				//tam thoi redirect ra trang chu da
				return redirect('/');
			}
		}
	}
}
