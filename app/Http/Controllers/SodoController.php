<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sodo;
use App\hinh;
use Illuminate\Http\Response;

class SodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    function loadDataSodo(){
      $sodo = sodo::where('trangthai', 0)->orderBy('id', 'desc')->get();
      return response()->json(['sodo' => $sodo]);
    }
    function picBan(){
      $hinhban = hinh::where('id', 1)->get();
      return response()->json(['hinhban' => $hinhban[0]->hinhsudung]);
    }
    function picBanSD(){
      $hinhban = hinh::where('id', 2)->get();
      return response()->json(['hinhban' => $hinhban[0]->hinhsudung]);
    }
    function getNameBan(Request $res){
      $name = sodo::where('id', $res->id)->get();
      return response()->json(['name' => $name[0]]);
    }
    function deleteBan(Request $res){
      $name = sodo::where('id', $res->item)->update(['trangthai'=>1]);
      return response()->json(['name' => $name]);
    }
    function updateDataBan(Request $res){
      $data = $res->item;
      $name = sodo::where('id', $res->item)->update($data);
      return response()->json(['name' => $name]);
    }
    function insertBan(Request $res){
      $data = $res->item;
      $result = sodo::insert($data);
      return response()->json(['result' => $result]);
    }
}
