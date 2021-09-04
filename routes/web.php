<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\ProductController;
Use App\Http\Controllers\BlogController;
Use App\Http\Controllers\FrontproductController;
Use App\Http\Controllers\FrontblogController;
Use App\Http\Controllers\SellerviewController;
Use App\Http\Controllers\SellerblogController;

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
Route::get('products/add-to-cart/{id}',[ProductController::class, 'addToCart']);        


Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
    Route::get('/',[UserController::class, 'index']);
       
    Route::group(['prefix'=>'users','middleware'=>'auth'],function (){

        Route::get('/',[UserController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[UserController::class, 'UpdateUser']);
        Route::get('/add-user',[UserController::class, 'addUser']);
        Route::post('/search-user',[UserController::class, 'searchuserForAdmin']);
        Route::post('/add-user',[UserController::class, 'addNewUser']);
        Route::get('/edit-user/{id}',[UserController::class, 'editUser']);
        Route::post('/edit-user/{id}',[UserController::class, 'updateUser']);
        Route::post('/delete-user/{id}',[UserController::class, 'deleteUser']);

    });

    Route::group(['prefix'=>'products','middleware'=>'auth'],function (){

        Route::get('/',[ProductController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[ProductController::class, 'UpdateProduct']);
        Route::get('/add-product',[ProductController::class, 'addProduct']);
        Route::post('/search-product',[ProductController::class, 'searchproductForAdmin']);
        Route::post('/add-product',[ProductController::class, 'addNewProduct']);
        Route::post('/delete/{id}',[ProductController::class, 'deleteProduct']);                                                                                                            
        Route::get('/edit-product/{id}',[ProductController::class, 'editProduct']);
        Route::post('/edit-product/{id}',[ProductController::class, 'updateProduct']);

    });
    
    Route::group(['prefix'=>'blogView','middleware'=>'auth'],function (){

        Route::get('/',[BlogController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[BlogController::class, 'UpdateBlog']);
        Route::get('/add-blog',[BlogController::class, 'addBlog']);
        Route::post('/search-blog',[BlogController::class, 'searchblogForAdmin']);
        Route::post('/add-blog',[BlogController::class, 'addNewBlog']);
        Route::get('/edit-blog/{id}',[BlogController::class, 'editBlog']);
        Route::post('/edit-blog/{id}',[BlogController::class, 'updateBlog']);
        Route::post('/delete-blog/{id}',[BlogController::class, 'deleteBlog']);

    });

});




Route::group(['prefix'=>'seller','middleware'=>'seller'],function (){
    Route::get('/',[SellerviewController::class, 'index']);
       

    Route::group(['prefix'=>'products','middleware'=>'auth'],function (){

        Route::get('/',[SellerviewController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[SellerviewController::class, 'UpdateProduct']);
        Route::get('/add-product',[SellerviewController::class, 'addProduct']);
        // Route::post('/search-product',[SellerviewController::class, 'searchproductForAdmin']);
        Route::post('/add-product',[SellerviewController::class, 'addNewProduct']);
        Route::post('/delete/{id}',[SellerviewController::class, 'deleteProduct']);                                                                                                            
        Route::get('/edit-product/{id}',[SellerviewController::class, 'editProduct']);
        Route::post('/edit-product/{id}',[SellerviewController::class, 'updateProduct']);

    });
    
    Route::group(['prefix'=>'blogView','middleware'=>'auth'],function (){

        Route::get('/',[SellerblogController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[SellerblogController::class, 'UpdateBlog']);
        Route::get('/add-blog',[SellerblogController::class, 'addBlog']);
        // Route::post('/search-blog',[SellerblogController::class, 'searchblogForAdmin']);
        Route::post('/add-blog',[SellerblogController::class, 'addNewBlog']);
        Route::get('/edit-blog/{id}',[SellerblogController::class, 'editBlog']);
        Route::post('/edit-blog/{id}',[SellerblogController::class, 'updateBlog']);
        Route::post('/delete-blog/{id}',[SellerblogController::class, 'deleteBlog']);

    });

});










Route::group(['prefix'=>'homeproducts'],function (){

    Route::get('/',[FrontproductController::class, 'index']);
    Route::get('/view-product/{id}',[FrontproductController::class, 'viewProduct']);
    

});

    Route::get('/blog',[FrontblogController::class, 'index'])->middleware(['auth']);
    Route::get('/view-blog/{id}',[FrontblogController::class, 'viewBlog'])->middleware(['auth']);
    


Route::get('profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('products-detail', function () {
    return view('products-detail');
});




require __DIR__.'/auth.php';

// Route::get('/',[UserController::class, 'index']);
