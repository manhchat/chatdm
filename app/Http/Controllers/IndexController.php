<?php
namespace App\Http\Controllers;
use App\Classes\PublicController;
use App;
use Session;
use App\Classes\Codedef;
class IndexController extends PublicController
{
    /**
     * Home action
     */
	
    public function index()
    {
    	$categoryList = Codedef::getID('CATEGORY_LIST');
    	$danhSachTinhThanh = Codedef::getID('TINH_THANH');
    	return view('home', array('categoryList' => $categoryList, 'danhSachTinhThanh' => $danhSachTinhThanh));
    }
    /**
     * DucNV Starting
     * ChatDM comment
     */
}