<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoadon;
use Illuminate\Http\Response;
use DB;
use App\khuyenmai;

class HoaDonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    //bấm button gửi bếp insert thông tin vào bảng chitietdatmon
    function insertChiTietDatMon(Request $res){
      $insert = DB::table('chitietdatmon')->insert($res->item);
      return response()->json(['count' => $insert]);
    }
    function insertHoaDon(Request $res){
      $insert = DB::table('hoadon')->insert($res->item);
      return response()->json(['count' => $insert]);
    }
    function getThongke(){
      $thongke = DB::table('hoadon')->get();
      // print_r((['thongke' => $thongke]) );
      return response()->json(['thongke' => $thongke]);
    }
    function getKM(Request $res){
      $ma = $res->ma;
      $khuyenmai = DB::select("SELECT chietkhau FROM `khuyenmai` WHERE ngaybatdau <= Now() AND ngayketthuc >= Now() AND id = '$ma'");
      return response()->json(['khuyenmai' => $khuyenmai]);
    }
}
