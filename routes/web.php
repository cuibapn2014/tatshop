<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\bill;
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
Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');

Route::get('/','MainController@index');

Route::get('san-pham','MainController@getProduct');
Route::get('san-pham/{id}/{tenSanPham}','MainController@getChiTiet');
Route::post('san-pham/{id}/{tenSanPham}','MainController@postChiTiet');

Route::get('cao-cap',function(){
	return view('shop/premium');
});
Route::get('ve-chung-toi',function(){
	return view('shop/about');
});
Route::get('sign-up','AdminController@getSignup');
Route::post('sign-up','AdminController@postSignup');
Route::get('login','AdminController@getLogin');
Route::post('login','AdminController@postLogin');
Route::get('logout','AdminController@getLogout');

Route::group(['prefix' => 'admin','middleware' => 'checklogin'],function(){
	Route::get('/',function(){
		$bill = bill::where('stt','Chờ xác nhận')->get();
		return view('shop.admin.index',['bill' => $bill]);
	});
	Route::get('bao-mat','AdminController@getBaoMat');
	Route::post('bao-mat','AdminController@postBaoMat');
	
	Route::get('bills','AdminController@getBills');
	Route::get('bills/{id}','AdminController@getDetailBills');
	Route::get('bills/shipping/{id}','AdminController@getShip');
	Route::get('bills/shipping/confirm/{id}','AdminController@getShip');
	
	Route::group(['prefix' => 'dashboard'],function(){
		Route::get('them-san-pham','AdminController@getThemSanPham');
		Route::post('them-san-pham','AdminController@postThemSanPham');
		Route::get('edit/{id}','AdminController@getEdit');
		Route::post('discounts','AdminController@getDiscount');
		Route::post('edit/{id}','AdminController@postEdit');
		Route::get('quan-ly-san-pham','AdminController@getManagePro');
		Route::get('quan-ly-khach-hang','AdminController@getManageCus');
		Route::get('quan-ly-thanh-vien','AdminController@getManageMem');
		Route::get('edit-user/{id}','AdminController@getEditUser');
		Route::post('edit-user/{id}','AdminController@postEditUser');
		Route::get('delete-user/{id}','AdminController@getDeleteUser');
		Route::get('cap-nhat-tai-khoan','AdminController@getUpdateUser');
		Route::post('cap-nhat-tai-khoan','AdminController@postUpdateUser');
		Route::get('delete/{id}','AdminController@getDeletePro');
		Route::get('danh-gia-tu-khach-hang','AdminController@getComment');
		Route::get('delete-comments/{id}','AdminController@getDeleteComment');
	});
});

Route::get('search','MainController@getSearch');
Route::post('search','MainController@postSearch');

Route::group(['prefix' => 'user','middleware' => 'checklogin'],function(){
	Route::get('/','AdminController@getTransfer');
	Route::get('cap-nhat-tai-khoan','AdminController@getUpdateCus');
	Route::post('cap-nhat-tai-khoan','AdminController@postUpdateUser');
	Route::get('bao-mat','AdminController@getChangePass');
	Route::post('bao-mat','AdminController@postBaoMat');
});
Route::get('add-cart/{id}','MainController@getAdd');
Route::group(['prefix' => 'cart'], function(){
	Route::get('/','MainController@getCart');
	Route::post('/','MainController@postCart');
	Route::get('cancel',function(){
		Cart::clear();
		return back();
	});
	Route::get('delete/{id}','MainController@getRemoveCart');
	Route::get('add/{id}','MainController@getAddCart');
});
Route::get('chinh-sach',function(){
	return view('shop.policy');
});
Route::get('dieu-khoan',function(){
	return view('shop.rules');
});
Route::get('ajax/{district}','AdminController@getAjax');

Route::get('ajaxAdmin/{name}','AdminController@getAjaxSearch');

Route::get('send-mail/{id}','EmailController@sendEmail');