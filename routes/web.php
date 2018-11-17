<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/    
Route::get('/', function(){
    return view('welcome');

});
Route::group(['middleware' => 'api', 'prefix' => 'api'],function(){
    Route::post('postLogin', "LoginController@postLogin");
    Route::get('danhmuc', "HomeController@danhMuc");
    Route::get('hinh', "HomeController@hinh");
    Route::group(["prefix" => 'order' ],function(){
        Route::get('monan', "HomeController@loadData");
    });
    Route::group(["prefix" => 'sodo' ],function(){
        Route::get('sodo', "SodoController@loadDataSodo");
        Route::get('banchuasudung', "SodoController@picBan");
        Route::get('bandasudung', "SodoController@picBanSD");
        Route::post('nameban', "SodoController@getNameBan");
        
    });
    Route::group(["prefix" => 'hoadon' ],function(){
        Route::post('insertchitiet', "HoaDonController@insertChiTietDatMon");
        Route::post('inserthoadon', "HoaDonController@insertHoaDon");
        Route::post('khuyenmai', "HoaDonController@getKM");
        
    });
    Route::group(["prefix" => 'admin' ],function(){
        Route::group(["prefix" => 'ban' ],function(){
            Route::get('getBan', "SodoController@loadDataSodo");
            Route::post('delBan', "SodoController@deleteBan");
            Route::post('updateBan', "SodoController@updateDataBan");
            Route::post('insertBan', "SodoController@insertBan");
        });
        Route::group(["prefix" => 'monan' ],function(){
            Route::get('getMonan', "MonanAdminController@loadDataMonan");   
            Route::post('updateMonan', "MonanAdminController@updateDataMonan");   
            Route::post('delMonan', "MonanAdminController@deleteMonan"); 
            Route::post('insertMonan', "MonanAdminController@insertMonan"); 
              
                     
        });
        Route::group(["prefix" => 'nhanvien' ],function(){
            Route::get('getNhanvien', "LoginController@getDataNhanvien");
        });
        Route::group(["prefix" => 'thongke' ],function(){
            Route::get('getThongke', "HoaDonController@getThongke");
        });
    });
});

