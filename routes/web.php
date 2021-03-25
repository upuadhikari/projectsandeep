<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;

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
    return view('welcome');
}
);

Route::get('/products', 'ProductController@index');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/',[UserController::class, 'index']);
    Route::post('/updateuserinfo/{id}',[UserController::class, 'UpdateUser']);
            Route::get('/add-user',[UserController::class, 'addUser']);
            Route::post('/add-user',[UserController::class, 'addNewUser']);
            Route::get('/user/edit-user/{id}',[UserController::class, 'editUser']);
            Route::post('/user/edit-user/{id}',[UserController::class, 'updateUser']);
            Route::post('/delete-user/{id}',[UserController::class, 'deleteUser']);
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('logout', '\App\Http\Controllers\Auth\RegistereduserController@logout');


require __DIR__.'/auth.php';

// Route::get('/',[UserController::class, 'index']);
