<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sodo;
use App\hinh;
use Illuminate\Http\Response;
use DB;

class ThongKeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    function getThongKeThang(){
      $data = DB::select('SELECT SUM(sotien) as "tien", DAY(datedt) as "ngay" FROM `hoadon` WHERE MONTH(datedt) = MONTH(NOW()) GROUP BY DAY(datedt)');
      return response()->json(['data' => $data]);
    }
    function getThongKeGio(){
      $data = DB::select('SELECT COUNT(id) as "dem", HOUR(datedt) as "gio" FROM `hoadon` WHERE MONTH(NOW()) = MONTH(datedt) GROUP by HOUR(datedt)');
      return response()->json(['data' => $data]);
    }
    function getThongKeMonAn(){
      $data = DB::select('SELECT COUNT(idmonan) as "demmon", tenmon, idmonan FROM `chitietdatmon`, monan WHERE MONTH(datetimedatmon) = MONTH(NOW()) AND idmonan = monan.id GROUP by idmonan, monan.tenmon');
      return response()->json(['data' => $data]);
    }
    function getMonAn(){
      $data = DB::select('SELECT id, tenmon FROM `monan`');
      return response()->json(['data' => $data]);
    }
}
