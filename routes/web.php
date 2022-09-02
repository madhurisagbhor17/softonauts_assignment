<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
});

Route::get('/',function(){
    return view ('login');

});

Route::get('/registration',function(){
    return view('registration');
});

Route::get('/user',function(){
    return view('user');
});

Route::get('/chosen',function(){
    return view('chosen');
});

Route::post('/login',[UserController::class,'userLogin']);

Route::get('/userinfo',[UserController::class,'userInfo']);

Route::get('/fetchstudent',[UserController::class,'fetchStudent']);

Route::get('/fetchsub',[UserController::class,'fetchSub']);

Route::get('/deletestudent',[UserController::class,'deleteStudent']);

Route::get('/logout',function(){
    return view('login');
});




