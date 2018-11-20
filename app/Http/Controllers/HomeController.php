<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monan;
use Illuminate\Http\Response;
use App\chitietdatmon;
use App\danhmuc;
use App\hinh;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {    }
    function loadData(){
      $monan = monan::where('daxoa', 0)->get();
      return response()->json(['monan' => $monan]);
    }
    function danhMuc(){
      $dm = danhmuc::where('trangthai', 0)->get();
      return response()->json(['danhmuc' => $dm]);
    }
    function hinh(){
      $hinh = hinh::get();
      return response()->json(['hinh' => $hinh]);
    }
}
