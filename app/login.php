<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class login extends Model
{
  protected $table ='nhanvien'; 
	protected $primaryKey = 'id';
	public $timestamps = false;
	
	public function isLoginExits($username, $password){
		$dem = DB::select("select * from nhanvien where email = ".$username." and password = ".$password);
		return $dem;
	}
	public function isEmailUsernameExist($username, $password){
		$query = DB::select("select * from nhanvien where email = ".$username." and password = ".$password);
	}
	public function isValidEmail($email){
		return true;
	}
	public function loginUsers($username, $password){
		$canUserLogin = $this->isLoginExist($username, $password);
		if($canUserLogin){
			return 1;
		}else{
			return 0;
		}
	}
}
