<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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
    return view('home',[
        "title"=>"Home"
    ]);
});

Route::get('/login', function () {
    
});


Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/about_us', function () {
    return view('aboutus',[
        "title"=>"About Us JRamedia"
    ]);
});

Route::get('/home_admin', function () {
    return view('homeadmin', [
        "title"=>"Home Admin"
    ]);
});

Route::get('/home_cust', function () {
    return view('homecust', [
        "title"=>"Home Customers"
    ]);
});

Route::get('/view_product_admin', function () {
    return view('viewadmin', [
        "title"=>"View Product (Admin)"
    ]);
});

Route::get('/view_product_cust', function () {
    return view('viewcust', [
        "title"=>"View Product (Customer)"
    ]);
});

Route::get('/add_product', function () {
    return view('addproduct', [
        "title"=>"Add New Product"
    ]);
});

Route::get('/update_product', function () {
    return view('updateproduct', [
        "title"=>"Update Product"
    ]);
});


Route::get('/view_transaction', function () {
    return view('viewtransaction', [
        "title"=>"View Transaction History"
    ]);
});


Route::get('/view_account', function () {
    return view('viewaccount', [
        "title"=>"View Account"
    ]);
});

Route::get('/update_account', function () {
    return view('updateaccount', [
        "title"=>"Update Account"
    ]);
});
