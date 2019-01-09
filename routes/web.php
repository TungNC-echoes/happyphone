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
//route for site
Route::get('/', function () {
    return view('welcome');
});
Route::get('index','HomeController@index')->name('trangchu');
Route::get('/','HomeController@index')->name('trangchu');
Route::get('{id}/loaisp','HomeController@getLoaiSP')->name('loaisp');
Route::get('{id}/chitiet','HomeController@getSanPham')->name('chitiet');

Route::get('gioithieu','HomeController@getGioiThieu')->name('gioithieu');
Route::group(['middleware' => 'check_login'],function (){
    Route::get('dang-nhap','UserController@getDangNhap')->name('dangnhap');
    Route::get('dang-ky','UserController@getDangKy')->name('dangky');
});
Route::get('{id}/{value}/add-to-cart','CartController@add')->name('add_to_cart');
Route::get('gio-hang','CartController@index');

Route::post('dat-hang','OrderController@postOrder');
Route::get('{id}/{value}/update-cart','CartController@update');
Route::get('{id}/delete-cart','CartController@delete');


Route::post('dang-nhap','UserController@postDangNhap');
Route::get('dang-xuat','UserController@getDangXuat')->name('dangxuat');
Route::group(['middleware' => 'check_login1'],function (){
    Route::get('thay-doi-tai-khoan','UserController@getThayDoiTK')->name('thaydoitk');
    Route::get('dat-hang','OrderController@getOrder');
});
Route::post('dang-ky','UserController@postDangKy');
Route::post('check-email','UserController@checkEmail');
Route::post('thay-doi-tai-khoan','UserController@postThayDoiTK');
Route::get('search','HomeController@search');
Route::get('timkiem','HomeController@timkiem')->name('search');
Route::get('lienhe','HomeController@getLienHe')->name('lienhe');
Route::post('lienhe','HomeController@postLienHe');

/* Comment */

Route::post('comment/{product_id}','CommentController@create');

//route for admin
Route::group(['prefix' => 'admin','middleware' => 'admin_login'],function (){
    Route::get('home/index','admin\HomeController@index')->name('index');
    Route::get('home/chitiet/{id}','admin\TransactionController@chitiet');
    Route::group(['prefix' => 'product'],function (){
        Route::get('view','admin\ProductController@view')->name('product');
        Route::get('add','admin\ProductController@add');
        Route::post('add','admin\ProductController@postAdd');
        Route::get('edit/{id}','admin\ProductController@edit');
        Route::post('edit/{id}','admin\ProductController@postEdit');
        Route::get('delete/{id}','admin\ProductController@delete');
        Route::post('deleteMultiple','admin\ProductController@deleteMultiple');
        Route::get('search','admin\ProductController@search')->name('search_admin');
    });
    Route::group(['prefix' => 'catalog'],function (){
        Route::get('view','admin\CatalogController@view')->name('catalog');
        Route::get('add','admin\CatalogController@add');
        Route::post('add','admin\CatalogController@postAdd');
        Route::get('edit/{id}','admin\CatalogController@edit');
        Route::post('edit/{id}','admin\CatalogController@postEdit');
        Route::get('delete/{id}','admin\CatalogController@delete');
        Route::post('deleteMultiple','admin\CatalogController@deleteMultiple');
    });
    Route::group(['prefix' => 'contact'],function (){
        Route::get('view','admin\ContactController@view')->name('contact');
        Route::get('delete/{id}','admin\ContactController@delete');
        Route::post('deleteMultiple','admin\ContactController@deleteMultiple');
    });
    Route::group(['prefix' => 'user'],function (){
        Route::post('check-email','admin\UserController@checkEmail');
        Route::get('view','admin\UserController@view')->name('user');
        Route::get('add','admin\UserController@add');
        Route::post('add','admin\UserController@postAdd');
        Route::get('edit/{id}','admin\UserController@edit');
        Route::post('edit/{id}','admin\UserController@postEdit');
        Route::get('delete/{id}','admin\UserController@delete');
        Route::post('deleteMultiple','admin\UserController@deleteMultiple');
    });
    Route::group(['prefix' => 'admin'],function (){
        Route::get('view','admin\AdminController@view')->name('admin');
        Route::get('edit/{id}','admin\AdminController@edit');
        Route::post('edit/{id}','admin\AdminController@postEdit');
    });
    Route::group(['prefix' => 'slide'],function (){
        Route::get('view','admin\SlideController@view')->name('slide');
        Route::get('add','admin\SlideController@add');
        Route::post('add','admin\SlideController@postAdd');
        Route::get('edit/{id}','admin\SlideController@edit');
        Route::post('edit/{id}','admin\SlideController@postEdit');
        Route::get('delete/{id}','admin\SlideController@delete');
    });
    Route::group(['prefix' => 'order'],function (){
        Route::get('view','admin\OrderController@view')->name('order');
        Route::get('delete/{id}','admin\OrderController@delete');
        Route::post('deleteMultiple','admin\OrderController@deleteMultiple');
        Route::get('search','admin\OrderController@search')->name('search_order');
    });
    Route::group(['prefix' => 'transaction'],function (){
        Route::get('view','admin\TransactionController@view')->name('transaction');
        Route::get('chitiet/{id}','admin\TransactionController@chitiet');
        Route::get('delete/{id}','admin\TransactionController@delete');
        Route::post('deleteMultiple','admin\TransactionController@deleteMultiple');
        Route::get('search','admin\TransactionController@search')->name('search_transaction');
    });
    Route::get('admin/logout','admin\AdminController@getLogout')->name('logout');
});
Route::get('admin/login','admin\AdminController@getLogin');
Route::post('admin/login','admin\AdminController@postLogin');

