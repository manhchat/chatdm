<?php
/**
 * Codedef.php
 *
 * @author	 ChatDM
 */

/**
 * Codedef function.
 *
 * @category   Common
 * @copyright  Copyright 2014 ChatDM
 * @author	 ChatDM
 */
namespace App\Classes;
use Session;
class ClassesAuth
{
	/**
	 * 
	 * @param string $key
	 * @return array | NULL
	 */
	public static function set($data)
	{
		Session::regenerate();
		Session::set(LOGIN_IDENTITY, $data);
		Session::set(LOGIN_IDENTITY_TIMELIFE , time());
	}
	public static function isAuth()
	{
		if (Session::has(LOGIN_IDENTITY)) {
			return true;
		}
		return false;
	}
	public static function updateExprire($sec)
	{
		$timeLife = Session::get(LOGIN_IDENTITY_TIMELIFE);
		$sessionTimeout = $timeLife + $sec;
		if (time() > $sessionTimeout) {
			Session::forget(LOGIN_IDENTITY);
			Session::forget(LOGIN_IDENTITY_TIMELIFE);

		} else {
			Session::set(LOGIN_IDENTITY_TIMELIFE, time());
		}
	}
	
	public static function logout()
	{
		Session::forget(LOGIN_IDENTITY);
		Session::forget(LOGIN_IDENTITY_TIMELIFE);
	}
	
}