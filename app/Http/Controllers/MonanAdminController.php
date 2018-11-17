<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\monan;
use Illuminate\Http\Response;

class MonanAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    function loadDataMonan(){
      $monan = monan::where('daxoa', 0)->orderBy('id', 'desc')->get();
      return response()->json(['monan' => $monan]);
    }
    function deleteMonan(Request $res){
      $result = monan::where('id', $res->id)->update(['daxoa'=>1]);
      return response()->json(['result' => $result]);
    }
    function updateDataMonan(Request $res){
      $data = $res->item;
      $result = monan::where('id', $data['id'])->update($data);
      return response()->json(['result' => $result]);
    }
    function insertMonan(Request $res){
      $data = $res->item;
      $result = monan::insert($data);
      return response()->json(['result' => $result]);
    }
    
}
