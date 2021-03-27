<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\ProductController;
Use App\Http\Controllers\FrontproductController;

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

Route::get('/',[FrontproductController::class, 'index']);

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/',[UserController::class, 'index']);

        
    Route::group(['prefix'=>'users','middleware'=>'auth'],function (){

        Route::get('/',[UserController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[UserController::class, 'UpdateUser']);
        Route::get('/add-user',[UserController::class, 'addUser']);
        Route::post('/add-user',[UserController::class, 'addNewUser']);
        Route::get('/edit-user/{id}',[UserController::class, 'editUser']);
        Route::post('/edit-user/{id}',[UserController::class, 'updateUser']);
        Route::post('/delete-user/{id}',[UserController::class, 'deleteUser']);

    });


    Route::group(['prefix'=>'products','middleware'=>'auth'],function (){

        Route::get('/',[ProductController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[ProductController::class, 'UpdateProduct']);
        Route::get('/add-product',[ProductController::class, 'addProduct']);
        Route::post('/add-product',[ProductController::class, 'addNewProduct']);
        Route::get('/edit-product/{id}',[ProductController::class, 'editProduct']);
        Route::post('/edit-product/{id}',[ProductController::class, 'updateProduct']);
        Route::post('/delete-product/{id}',[ProductController::class, 'deleteProduct']);

    });

});

Route::group(['prefix'=>'homeproducts','middleware'=>'auth'],function (){

    Route::get('/',[FrontproductController::class, 'index']);
    Route::get('/view-product/{id}',[FrontproductController::class, 'viewProduct']);
    

});



Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('products', function () {
    return view('products');
});


Route::get('blog', function () {
    return view('blog');
});



Route::get('logout', '\App\Http\Controllers\Auth\RegistereduserController@logout');


require __DIR__.'/auth.php';

// Route::get('/',[UserController::class, 'index']);
