<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
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

Route::get('/','ProductController@index');

Route::get('san-pham', 'CategoryController@index');
Route::get('san-pham/{id}/{tenSanPham}', 'ProductController@show');
Route::post('san-pham/{id}/{tenSanPham}', 'ReplyController@store');
Route::get('cao-cap', function () {
	return view('shop/premium');
});

Route::get('ve-chung-toi', function () {
	return view('shop/about');
});


Route::get('sign-up', 'AdminController@getSignup');
Route::post('sign-up', 'UserController@store');
Route::get('login', 'AdminController@getLogin');
Route::post('login', 'AdminController@login')->name('login');
Route::get('logout', 'AdminController@getLogout');
Route::get('login/facebook', 'LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'LoginController@handleFacebookCallback');

Route::group(['prefix' => 'admin', 'middleware' => 'check.admin'], function () {
	Route::get('/', function () {
		$bill = bill::where('stt', 1)->get();
		return view('shop.admin.index', ['bill' => $bill]);
	});
	Route::get('bao-mat', 'AdminController@getBaoMat');
	Route::post('bao-mat', 'AdminController@postBaoMat');

	Route::get('bills', 'BillController@index');
	Route::get('bills/{id}', 'BillController@show');
	Route::get('bills/shipping/{id}', 'AdminController@getShip');
	Route::get('bills/shipping/confirm/{id}', 'AdminController@getShip');
	Route::get('deleteBill/{id}', 'BillController@destroy');

	Route::get('analyze', 'AdminController@getAnalyze');

	Route::group(['prefix' => 'dashboard'], function () {
		Route::get('them-san-pham', 'AdminController@getThemSanPham');
		Route::post('them-san-pham', 'ProductController@store');
		Route::get('edit/{id}', 'AdminController@getEdit');
		Route::post('edit/{id}', 'ProductController@update');
		Route::get('quan-ly-san-pham', 'AdminController@getManagePro');

		Route::get('quan-ly-khach-hang', 'AdminController@getManageCus');
		Route::get('quan-ly-thanh-vien', 'AdminController@getManageMem');

		Route::post('discounts', 'AdminController@postDiscount');
		Route::get('edit-user/{id}', 'AdminController@getEditUser');
		Route::post('edit-user/{id}', 'AdminController@postEditUser');
		Route::get('delete-user/{id}', 'UserController@destroy');
		Route::get('cap-nhat-tai-khoan', 'AdminController@getUpdateUser');
		Route::post('cap-nhat-tai-khoan', 'UserController@update');
		Route::get('delete/{id}', 'ProductController@destroy');
		Route::get('danh-gia-tu-khach-hang', 'ReplyController@index');
		Route::get('delete-comments/{id}', 'ReplyController@destroy');
		Route::get('blog', 'AdminController@getBlog');
		Route::post('blog', 'BlogController@store');
		Route::get('deleteBlog/{id}', 'BlogController@destroy');
		Route::get('ma-giam-gia', 'CodeDiscountController@index');
		Route::post('ma-giam-gia', 'CodeDiscountController@store');
		Route::get('deleteCode/{id}', 'CodeDiscountController@destroy');
		Route::get('them-danh-muc', 'AdminController@addCategory');
		Route::post('them-danh-muc', 'CategoryController@store');
		Route::get('delete-category/{id}', 'CategoryController@destroy');
		Route::get('delete-subcategory/{id}', 'SubcategoryController@destroy');
		Route::get('upload', 'AdminController@getUpload');
		Route::post('upload', 'AdminController@postUpload');
	});
});

Route::get('search', 'MainController@getSearch');
Route::post('search', 'MainController@postSearch');

Route::group(['prefix' => 'user', 'middleware' => 'check.user'], function () {
	Route::get('/', 'AdminController@getTransfer');
	Route::get('cap-nhat-tai-khoan', 'AdminController@getUpdateCus');
	Route::post('cap-nhat-tai-khoan', 'UserController@update');
	Route::get('bao-mat', 'AdminController@getChangePass');
	Route::post('bao-mat', 'AdminController@postBaoMat');
});
Route::get('add-cart/{id}', 'MainController@getAdd');
Route::group(['prefix' => 'cart'], function () {
	Route::get('/', 'CartController@index');
	Route::post('/', 'BillController@store');
	Route::get('cancel', function () {
		Cart::clear();
		return back();
	});
	Route::get('delete/{id}', 'CartController@destroy');
	Route::get('add/{id}', 'CartController@store');
});

Route::post('payments-online', 'MainController@create');
Route::get('return-vnpay', 'MainController@return');
Route::get('ajaxCode/{code}/{price}', 'MainController@ajaxCode');
Route::get('blog', 'BlogController@index');
Route::get('filter/{id}', 'SubcategoryController@show');

Route::get('chinh-sach', function () {
	return view('shop.policy');
});

Route::get('bao-mat', function () {
	return view('shop.secure');
});

Route::get('test', function () {
	return view('test');
});

Route::get('category/{id}', 'CategoryController@show');

Route::get('ajax/{district}', 'AdminController@getAjax')->middleware('check.user');
Route::get('ajaxCategory/{category}', 'AdminController@getAjaxCategory')->middleware('check.admin');
Route::get('ajaxAdmin/{name}', 'AdminController@getAjaxSearch');
Route::get('ajaxLike/{id}', 'MainController@getAjaxLike');
Route::get('getAjaxLike/{id}', 'MainController@getAjaxLikeCurrent');
Route::get('updateCart/{id}/{qty}', 'CartController@update');
Route::get('send-mail/{id}', 'EmailController@sendEmail')->middleware('check.admin');
Route::get('invoice/{id}', 'EmailController@detailInvoice');
Route::get('notification', 'EmailController@sendEmailOrder');

//CALCULATE FEE
Route::get('cal-fee/province={province}&district={district}&qty={qty}&value={value}', 'ShipController@getFee')->name('cal-fee');