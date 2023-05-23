<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubitemController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
 
Auth::routes(['verify'=>true]);
   
 //admin dashboard controller route
Route::group(['prefix'=>'admin', 'middleware'=>'admin','verified' ], function(){
    //admin dashboard home route
    Route::get('dashboard', [App\Http\Controllers\Admin\dashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('slider', SliderController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('item', ItemController::class);
    Route::resource('subitem', SubitemController::class);
    Route::resource('reservation', ReservationController::class);
    //order list route
    Route::get('order', [App\Http\Controllers\Admin\UserOrderController::class, 'index'])->name('order.index');
    //order update / confirm
    Route::post('/update/{id}', [App\Http\Controllers\Admin\UserOrderController::class, 'update'])->name('order.update');  
    //order cancelOrder
    Route::post('/cancelOrder/{id}', [App\Http\Controllers\Admin\UserOrderController::class, 'cancelOrder'])->name('order.cancelOrder');  
    //order delete by admin
    Route::post('/delete/{id}', [App\Http\Controllers\Admin\UserOrderController::class, 'destroy'])->name('order.destroy');
    
});

 //admin login
   Route::get('wp-admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
    

 // register sub-admin
   Route::get('subadmin', [App\Http\Controllers\Auth\RegisterController::class, 'subadmin'])->name('subadmin.register');
 // register sub-admin
   Route::post('subadmins', [App\Http\Controllers\Auth\RegisterController::class, 'subadmins'])->name('subadmins.register');
   
    
 