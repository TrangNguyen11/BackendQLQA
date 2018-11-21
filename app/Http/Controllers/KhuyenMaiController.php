<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\khuyenmai;
use Illuminate\Http\Response;
use DB;

class KhuyenMaiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    function loadDataKhuyenmai(){
      $khuyenmai = DB::select("SELECT * FROM `khuyenmai` WHERE daxoa = 0 ORDER BY  id DESC");
      return response()->json(['khuyenmai' => $khuyenmai]);
    }
    function deleteKhuyenmai(Request $res){
      $result = khuyenmai::where('id', $res->id)->update(['daxoa'=>1]);
      return response()->json(['result' => $result]);
    }
    public function updateDataKhuyenmai(Request $res){
      $data = $res->item;
      $result = khuyenmai::where('id', $data['id'])->update($data);
      return response()->json(['result' => $result]);
    }
    function insertKhuyenmai(Request $res){
      $data = $res->item;
      $result = khuyenmai::insert($data);
      return response()->json(['result' => $result]);
    }
    function checkMaKM(Request $res){
      $result = khuyenmai::where('id', $res->item)->get();
      return $result;
    }
    
    
}
