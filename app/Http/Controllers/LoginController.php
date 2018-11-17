<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\login;
use Illuminate\Http\Response;
use DB;

class LoginController extends Controller
{
    public function postLogin(Request $request){        
        if(isset($request->email)){
            $username = $request->email;
        }        
        if(isset($request->password)){
            $password = md5($request->password);
        }        
        $login = login::where('sdt', $username)->where('matkhau',$password)->get();
        return response()->json(['login' => $login],200);
    }
    public function getDataNhanvien(){
        $nhanvien = login::all();
        return response()->json(['nhanvien' => $nhanvien]);
    }
}