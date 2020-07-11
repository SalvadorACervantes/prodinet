<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

Route::get('/','HomeController@index')->name('home');
Route::view('/about','about')->name('about');
Route::view('/privacy_policie','privacy_policie')->name('policie');
Route::view('/terms_conditions','terms_conditions')->name('terms');
Route::view('/contact','contact')->name('contact');
Route::post('/contact','MessageController@store')->name('messages.store');

//Rutas para funciones del usuario
Route::get('/account','AccountController@index')->name('account.index')->middleware('auth','verified');
//Editar nombre y apellido
Route::get('account/edit','AccountController@edit_name')->name('edit.account');
Route::patch('account/update','AccountController@update_name')->name('update.account');
//Editar numero de telefono
Route::get('account/telephone/edit','AccountController@edit_phone')->name('edit_phone.account');
Route::patch('account/telephone/update','AccountController@update_phone')->name('update_phone.account');
//Registrar razon social y rfc
Route::get('account/billing/add','AccountController@create_billing')->name('create_billing.account');
Route::POST('account/billing/','AccountController@store_billing')->name('store_billing.account');


Route::get('account/billing/edit','AccountController@edit_billing')->name('edit_billing.account');
Route::patch('account/billing/update/{id}','AccountController@update_billing')->name('update_billing.account');
//Registrar y actualizar direccion
Route::get('account/address/add','AccountController@create_address')->name('create_address.account');
Route::POST('account/address','AccountController@store_address')->name('store_address.account');
///

Route::get('account/address/edit','AccountController@edit_address')->name('edit_address.account');
Route::patch('account/address/update/{id}','AccountController@update_address')->name('update_address.account');

//Route::patch('/account/edit','AccountController@update')->name('account.update')->middleware('auth','verified');

//Rutas para acceder a los productos
Route::get('/products','ProductController@index')->name('products.index');
Route::get('/products/{product}','ProductController@show')->name('products.show');
Route::get('/search','SearchController@show')->name('products.search');


//Rutas para carrito de compras
Route::resource('in_shopping_carts','InShoppingCartsController',['only'=>['store','destroy']]);
Route::get('/cart','ShoppingCartsController@index')->name('mycart');

//Acceso a clientes
Auth::routes(['verify' => true]);
Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');

//Rutas para metodo de pagos //Paypal
Route::get('Payment', 'PayPalPaymentController@Payment')->name('PayPalPayment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');