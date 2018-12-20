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
Route::get('/test',function () {
	for($i=0;$i<1000;$i++){
		redirect('https://sharecode.vn/source-code/website-ban-hang-online-su-dung-php-mysql-16195.htm');
	}
});
Route::get('index.html','HomeController@index')->name('trangchu');
Route::get('/','HomeController@index')->name('trangchu');
Route::get('{id}/loaisp.html','HomeController@getLoaiSP')->name('loaisp');
Route::get('{id}/chitiet.html','HomeController@getSanPham')->name('chitiet');

Route::get('gioithieu.html','HomeController@getGioiThieu')->name('gioithieu');
Route::group(['middleware' => 'check_login'],function (){
    Route::get('dang-nhap.html','UserController@getDangNhap')->name('dangnhap');
    Route::get('dang-ky.html','UserController@getDangKy')->name('dangky');
});
Route::get('{id}/{value}/add-to-cart.html','CartController@add')->name('add_to_cart');
Route::get('gio-hang.html','CartController@index');

Route::post('dat-hang.html','OrderController@postOrder');
Route::get('{id}/{value}/update-cart.html','CartController@update');
Route::get('{id}/delete-cart.html','CartController@delete');


Route::post('dang-nhap.html','UserController@postDangNhap');
Route::get('dang-xuat.html','UserController@getDangXuat')->name('dangxuat');
Route::group(['middleware' => 'check_login1'],function (){
    Route::get('thay-doi-tai-khoan.html','UserController@getThayDoiTK')->name('thaydoitk');
    Route::get('dat-hang.html','OrderController@getOrder');
});
Route::post('dang-ky.html','UserController@postDangKy');
Route::post('check-email.html','UserController@checkEmail');
Route::post('thay-doi-tai-khoan.html','UserController@postThayDoiTK');
Route::get('search.html','HomeController@search');
Route::get('timkiem.html','HomeController@timkiem')->name('search');
Route::get('lienhe.html','HomeController@getLienHe')->name('lienhe');
Route::post('lienhe.html','HomeController@postLienHe');

/* Comment */

Route::post('comment/{product_id}','CommentController@create');

//route for admin
Route::group(['prefix' => 'admin','middleware' => 'admin_login'],function (){
    Route::get('home/index.html','admin\HomeController@index')->name('index');
    Route::get('home/chitiet/{id}.html','admin\TransactionController@chitiet');
    Route::group(['prefix' => 'product'],function (){
        Route::get('view.html','admin\ProductController@view')->name('product');
        Route::get('add.html','admin\ProductController@add');
        Route::post('add.html','admin\ProductController@postAdd');
        Route::get('edit/{id}.html','admin\ProductController@edit');
        Route::post('edit/{id}.html','admin\ProductController@postEdit');
        Route::get('delete/{id}.html','admin\ProductController@delete');
        Route::post('deleteMultiple.html','admin\ProductController@deleteMultiple');
        Route::get('search.html','admin\ProductController@search')->name('search_admin');
    });
    Route::group(['prefix' => 'catalog'],function (){
        Route::get('view.html','admin\CatalogController@view')->name('catalog');
        Route::get('add.html','admin\CatalogController@add');
        Route::post('add.html','admin\CatalogController@postAdd');
        Route::get('edit/{id}.html','admin\CatalogController@edit');
        Route::post('edit/{id}.html','admin\CatalogController@postEdit');
        Route::get('delete/{id}.html','admin\CatalogController@delete');
        Route::post('deleteMultiple.html','admin\CatalogController@deleteMultiple');
    });
    Route::group(['prefix' => 'contact'],function (){
        Route::get('view.html','admin\ContactController@view')->name('contact');
        Route::get('delete/{id}.html','admin\ContactController@delete');
        Route::post('deleteMultiple.html','admin\ContactController@deleteMultiple');
    });
    Route::group(['prefix' => 'user'],function (){
        Route::post('check-email.html','admin\UserController@checkEmail');
        Route::get('view.html','admin\UserController@view')->name('user');
        Route::get('add.html','admin\UserController@add');
        Route::post('add.html','admin\UserController@postAdd');
        Route::get('edit/{id}.html','admin\UserController@edit');
        Route::post('edit/{id}.html','admin\UserController@postEdit');
        Route::get('delete/{id}.html','admin\UserController@delete');
        Route::post('deleteMultiple.html','admin\UserController@deleteMultiple');
    });
    Route::group(['prefix' => 'admin'],function (){
        Route::get('view.html','admin\AdminController@view')->name('admin');
        Route::get('edit/{id}.html','admin\AdminController@edit');
        Route::post('edit/{id}.html','admin\AdminController@postEdit');
    });
    Route::group(['prefix' => 'slide'],function (){
        Route::get('view.html','admin\SlideController@view')->name('slide');
        Route::get('add.html','admin\SlideController@add');
        Route::post('add.html','admin\SlideController@postAdd');
        Route::get('edit/{id}.html','admin\SlideController@edit');
        Route::post('edit/{id}.html','admin\SlideController@postEdit');
        Route::get('delete/{id}.html','admin\SlideController@delete');
    });
    Route::group(['prefix' => 'order'],function (){
        Route::get('view.html','admin\OrderController@view')->name('order');
        Route::get('delete/{id}.html','admin\OrderController@delete');
        Route::post('deleteMultiple.html','admin\OrderController@deleteMultiple');
        Route::get('search.html','admin\OrderController@search')->name('search_order');
    });
    Route::group(['prefix' => 'transaction'],function (){
        Route::get('view.html','admin\TransactionController@view')->name('transaction');
        Route::get('chitiet/{id}.html','admin\TransactionController@chitiet');
        Route::get('delete/{id}.html','admin\TransactionController@delete');
        Route::post('deleteMultiple.html','admin\TransactionController@deleteMultiple');
        Route::get('search.html','admin\TransactionController@search')->name('search_transaction');
    });
    Route::get('admin/logout.html','admin\AdminController@getLogout')->name('logout');
});
Route::get('admin/login.html','admin\AdminController@getLogin');
Route::post('admin/login.html','admin\AdminController@postLogin');

