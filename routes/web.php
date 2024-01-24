<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/user/welcome');
});
Route::get('/detail', function () {
    return view('/user/product/detail');
});

Route::get('/admin/auth/register', 'Admin\AuthController@register')->name('admin.auth.register');
Route::post('/admin/auth/register', 'Admin\AuthController@pRegister')->name('admin.auth.p.register');
Route::get('/admin/auth/login', 'Admin\AuthController@login')->name('admin.auth.login');
Route::post('/admin/auth/login', 'Admin\AuthController@pLogin')->name('admin.auth.p.login');





Route::group([
    'prefix' => '/admin/',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => 'admin'], function () {
        Route::get('welcome', 'AuthController@home')->name('welcome');
        Route::get('/', 'AuthController@logout')->name('logout');
        // category (danh mục)
        Route::get('category/index', 'CategoryController@index')->name('category.index');
        Route::get('category/create', 'CategoryController@create')->name('category.create');
        Route::post('category/create', 'CategoryController@store')->name('category.store');
        Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('category/edit/{id}', 'CategoryController@update')->name('category.update');
        Route::get('category/hidden/{id}', 'CategoryController@hidden')->name('category.hidden');
        Route::get('category/undo/{id}', 'CategoryController@undo')->name('category.undo');
        Route::delete('category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');

        //admin
        Route::resource('admin', 'AdminController')->except(['show']);
        Route::get('admin/profile', 'AdminController@profile')->name('admin.profile');
        Route::get('admin/hidden/{id}', 'AdminController@hidden')->name('admin.hidden');
        Route::get('admin/undo/{id}', 'AdminController@undo')->name('admin.undo');
        Route::get('admin/changePassword', 'AdminController@change')->name('admin.change');
        Route::post('admin/changePassword', 'AdminController@changepass')->name('admin.changepass');

        // trademark (nhãn hiệu)
        Route::resource('trademark', 'TrademarkController')->except(['show']);
        Route::get('trademark/hidden/{id}', 'TrademarkController@hidden')->name('trademark.hidden');
        Route::get('trademark/undo/{id}', 'TrademarkController@undo')->name('trademark.undo');

        // color (màu)
        Route::resource('color', 'ColorController')->except(['show']);
        Route::get('color/hidden/{id}', 'ColorController@hidden')->name('color.hidden');
        Route::get('color/undo/{id}', 'ColorController@undo')->name('color.undo');
        // product (sản phẩm)
        Route::resource('product', 'ProductController')->except(['show']);
        Route::get('product/hidden/{id}', 'ProductController@hidden')->name('product.hidden');
        Route::get('product/undo/{id}', 'ProductController@undo')->name('product.undo');
        Route::get('product/createImg', 'ProductController@createImg')->name('product.createImg');
        Route::post('product/createImg/{id}', 'ProductController@storeImg')->name('product.storeImg');
        Route::get('product/editImg/{id}', 'ProductController@editImg')->name('product.editImg');
        Route::post('product/editImg/{id}', 'ProductController@updateImg')->name('product.updateImg');
        Route::get('product/createDes/{id}', 'ProductController@createDes')->name('product.createDes');
        Route::post('product/createDes/{id}', 'ProductController@storeDes')->name('product.storeDes');
        Route::get('product/editDes/{id}', 'ProductController@editDes')->name('product.editDes');
        Route::post('product/editDes/{id}', 'ProductController@updateDes')->name('product.updateDes');
        


    });

