<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {

    return view('view.pages.content');
})->name('home');

Route::get('about', function () {

    return view('view.pages.about');
})->name('about');

Route::get('contacts', function () {

    return view('view.pages.contacts');
})->name('contacts');

Route::get('search', 'HomeController@getSearch')->name('search');
Route::get('product/{id}', 'HomeController@showProduct')->name('product');
Route::get('type-product/{nameSlug}/{id}', 'HomeController@showTypeProduct')->name('type-product');

Route::get('cart', 'CartController@index')->name('cart')->middleware('CheckLogin');
Route::post('cart', 'CartController@store')->name('cart.store')->middleware('CheckLogin');
Route::get('empty', 'CartController@empty');
Route::get('cart/delete/{id}', 'CartController@delete')->name('cart.delete');
Route::get('update', 'CartController@update')->name('cart.update');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::get('/thankyou', 'ConfirmationController@index')->name('thankyou.index');
Route::post('/thankyou', 'ConfirmationController@store')->name('thankyou.store');

Route::get('/signup', 'AdminController@index')->name('signup.index');
Route::post('/signup', 'AdminController@store')->name('signup.store');
Route::get('/login', 'AdminController@showLogin')->name('signup.showlogin');
Route::post('/login','AdminController@Login')->name('signup.login');
Route::get('/logout', 'AdminController@Logout')->name('signup.logout');
Route::get('/custome', 'AdminController@showProfile')->name('signup.showprofile');
Route::get('edit_profile', 'AdminController@showEditProfile')->name('signup.showeditprofile');
Route::post('/edit_profile/{id}', 'AdminController@editProfile')->name('signup.editprofile');
Route::get('/edit_password', 'AdminController@showEditPassword')->name('signup.showeditpassword');
Route::post('/edit_password/{id}', 'AdminController@editPassword')->name('signup.editpassword');

Route::group(['prefix' => 'dashboard', ['middleware' => 'CheckLogin']], function () {
    Route::get('/product', 'DashboardController@showProduct')->name('dashboard.showproduct');
    Route::post('/product', 'DashboardController@addProduct')->name('dashboard.addproduct');
    Route::get('/list_product','DashboardController@listProduct')->name('dashboard.listproduct');
    Route::get('/delete/{id}', 'DashboardController@deleteProduct')->name('dashboard.deleteproduct');
    Route::get('/edit/{id}','DashboardController@showEditProduct')->name('dashboard.showeditproduct');
    Route::post('/edit/{id}', 'DashboardController@editProduct')->name('dashboard.editproduct');


    Route::get('/type_product','DashboardController@showTypeProduct')->name('dashboard.showtypeproduct');
    Route::post('/type_product', 'DashboardController@addTypeProduct')->name('dashboard.addtypeproduct');
    Route::get('/list_type_product', 'DashboardController@listTypeProduct')->name('dashboard.listtypeproduct');
    Route::post('/delete/{id}', 'DashboardController@deleteTypeProduct')->name('dashboard.deletetypeproduct');
    Route::get('/edit/{id}', 'DashboardController@showEditTypeProduct')->name('dashboard.showedittypeproduct');

    Route::get('/list_bill', 'AdminBill@index')->name('adminbill.index');
    Route::get('/detail_bill/{id}', 'AdminBill@edit')->name('adminbill.edit');
    Route::post('/update_bill/{id}', 'AdminBill@update')->name('adminbill.update');
    Route::get('/delete_bill/{id}', 'AdminBill@destroy')->name('adminbill.destroy');
});


