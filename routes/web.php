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

Route::group(['prefix' => 'admin', 'namespace' => 'backend','middleware' => 'admin', 'before' => 'admin'], function()
{
    Route::get('/', 'AdminController@index');
    /* Routes for category section */
    Route::get('/categories', 'AdminCategory@show');
    Route::post('/categories/add', 'AdminCategory@add');
    Route::get('/categories/add', function(){
        return view('admin.category.add_edit');
    });
    Route::get('/categories/edit/{id}', 'AdminCategory@edit');
    Route::post('/categories/edit/{id}', 'AdminCategory@update');
    Route::get('/categories/delete/{id}', 'AdminCategory@delete');
    /* Routes for post section */
    Route::get('/posts', 'AdminPost@show');
    Route::post('/posts/add', 'AdminPost@add');
    Route::get('/posts/add', 'AdminPost@getAddPage');
    Route::get('/posts/edit/{id}', 'AdminPost@edit');
    Route::post('/posts/edit/{id}', 'AdminPost@update');
    Route::get('/posts/delete/{id}', 'AdminPost@delete');
    /* Routes for tag section */
    Route::get('/tags', 'AdminTag@show');
    Route::post('/tags/add', 'AdminTag@add');
    Route::get('/tags/add', function(){
        return view('admin.tag.add_edit');
    });
    Route::get('/tags/edit/{id}', 'AdminTag@edit');
    Route::post('/tags/edit/{id}', 'AdminTag@update');
    Route::get('/tags/delete/{id}', 'AdminTag@delete');
    /* Routes for section with static pages */
    Route::get('/staticpages', 'AdminPages@show');
    Route::post('/staticpages/add', 'AdminPages@add');
    Route::get('/staticpages/add', function(){
        return view('admin.pages.add_edit');
    });
    Route::get('/staticpages/edit/{id}', 'AdminPages@edit');
    Route::post('/staticpages/edit/{id}', 'AdminPages@update');
    Route::get('/staticpages/delete/{id}', 'AdminPages@delete');
});
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/about', 'FrontController@getAboutPage');
Route::get('/contact', 'FrontController@getContactPage');
Route::post('/contact', 'FrontController@getSendMessage');
Route::get('/my-account', 'UserController@getUserPage');
Route::post('/my-account', 'UserController@saveUserData');
Route::post('/comment/add', 'CommentController@add');
Route::get('/tags/{url}', 'TagController@getTagPageByURL');
Route::get('/{url}', 'CategoryController@getCategoryPageByURL');
Route::get('/{category_url}/{url}', 'PostController@getPostByURL');

