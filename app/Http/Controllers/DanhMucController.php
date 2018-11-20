<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\danhmuc;
use App\hinh;
use Illuminate\Http\Response;

class DanhMucController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    function loadDataDanhmuc(Request $res){
      $name = danhmuc::where('trangthai', 0)->orderBy('id', 'desc')->get();
      return response()->json(['name' => $name]);
    }
    function deleteDanhmuc(Request $res){
      $name = danhmuc::where('id', $res->item)->update(['trangthai'=>1]);
      return response()->json(['name' => $name]);
    }
    function updateDataDanhmuc(Request $res){
      $data = $res->item;
      $name = danhmuc::where('id', $res->item)->update($data);
      return response()->json(['name' => $name]);
    }
    function insertDanhmuc(Request $res){
      $data = $res->item;
      $result = danhmuc::insert($data);
      return response()->json(['result' => $result]);
    }
}
