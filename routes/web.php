<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('fontend.index');
});

Auth::routes(['verify'=>true]);

// fontend all pages route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('fontend.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('fontend.index');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('fontend.contact');
Route::get('/reservation', [App\Http\Controllers\HomeController::class, 'reservation'])->name('fontend.reservation');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('fontend.about');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('fontend.blog');
Route::get('/cart', [App\Http\Controllers\user\UserController::class, 'cart'])->name('fontend.cart');
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('fontend.menu');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('fontend.shop');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('fontend.services');
Route::get('/checkout', [App\Http\Controllers\user\UserController::class, 'checkout'])->name('fontend.checkout');
Route::get('/productsingle', [App\Http\Controllers\HomeController::class, 'productsingle'])->name('fontend.productsingle'); 
Route::get('/blogsingle', [App\Http\Controllers\HomeController::class, 'blogsingle'])->name('fontend.blogsingle');
Route::get('/staying', [App\Http\Controllers\user\UserController::class, 'staying'])->name('fontend.staying');
 
//user product view 
Route::get('/viewproduct/{id}', [App\Http\Controllers\ViewproductController::class, 'viewproduct'])->name('fontend.viewproduct');
 
Route::group(['prefix'=>'user', 'middleware'=>'user','verified'], function(){
    //user profile
    Route::get('/profile', [App\Http\Controllers\User\UserController::class, 'profile'])->name('fontend.profile');
     
    //user view order 
    Route::get('/myorder', [App\Http\Controllers\User\OrderController::class, 'myorder'])->name('fontend.myorder');
    
    //user view order 
    Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'carts'])->name('fontend.cart');
    
    //user Sent product Order
    Route::post('order', [App\Http\Controllers\Admin\UserOrderController::class, 'store'])->name('order.store');

  });
 
//route group
Route::group(['namespace'=> 'App\Http\Controllers\User', 'middleware'=>'user','verified'], function(){

    Route::get('/addcart', 'CartController@index')->name('fontend.cart');
    Route::resource('carts', CartController::class);

});


//user login
Route::get('/user-login', [App\Http\Controllers\Auth\LoginController::class, 'userLogin'])->name('user.login'); 
//user login
Route::post('/users-login', [App\Http\Controllers\Auth\LoginController::class, 'usersLogin'])->name('userslogin');
//user invalid click return logout
Route::get('/invalid_click', [App\Http\Controllers\Auth\LoginController::class, 'invalid'])->name('invalid');
 
  


  
// reservation table route
Route::post('/reservation', [App\Http\Controllers\User\ReservationController::class, 'sentReservation'])->name('sentReservation');
 
// contact form route by email system
Route::post('/contuct', [App\Http\Controllers\ContactController::class, 'contuct'])->name('contuct');
Route::post('/sendEmail', [App\Http\Controllers\ContactController::class, 'sendEmail'])->name('sendEmail');
 


 

