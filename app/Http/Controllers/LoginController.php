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
        $nhanvien = login::where('trangthai', 0)->orderBy('id', 'desc')->get();
        return response()->json(['nhanvien' => $nhanvien]);
    }
    public function deleteNhanVien(Request $res){
        $name = login::where('id', $res->item)->update(['trangthai'=>1]);
        return response()->json(['name' => $name]);
    }
    public function insertNhanvien(Request $res){
        $data = $res->item;
      $result = login::insert($data);
      return response()->json(['result' => $result]);
    }
    public function updateDataNhanvien(Request $res){
        $data = $res->item;
      $result = login::where('id', $data['id'])->update($data);
      return response()->json(['result' => $result]);
    }
    public function getDataAccount(Request $res){
        $result = login::where('id', $res->id)->get();
        return response()->json(['result' => $result]);
    }
    public function updateDataAccount(Request $res){
        $data = $res->item;
      $result = login::where('id', $data['id'])->update($data);
      return response()->json(['result' => $result]);
    }
}