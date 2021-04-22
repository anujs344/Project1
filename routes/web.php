<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContacusController;
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
    return view('front');
});
// Route for register page
Route::view('register', 'Register');
Route::post('register',[RegisterController::class,'getData']);

// Route for Login page
Route::get('login',function()
{
    if(session()->has('Login_Details'))
    {
        return redirect('profile');
    }
    return view('login');
});
Route::post('login',[LoginController::class,'GetData']);

//Route for profile page
Route::get('profile',function(){
    if(session()->has('Login_Details'))
    {
        return view('profile');
    }
    return redirect('login');
});

//for logouting the page
Route::get('logout',function(){
    if(session()->has('Login_Details'))
    {
        session()->pull('Login_Details');
    }
    return redirect('login');
});

// front page redirect
Route::view('front','front');
