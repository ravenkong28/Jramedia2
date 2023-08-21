<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ItemController;
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
    return view('welcome',[
        "title"=>"Welcome to Jramedia"
    ]);
})->middleware('guest');

Route::get('/about', function () {
    return view('aboutus',[
        "title"=>"About Us JRamedia"
    ]);
})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/home', function () {
    return view('Home.index',[
        "title"=>"Home Page JRamedia"
    ]);
})->middleware('auth');

Route::get('/home/checkSlug', [ItemController::class, 'checkSlug'])->middleware('auth');
Route::get('/home/view-products', [ItemController::class, 'index'])->middleware('auth');



// Route::get('/home/view-products/{item:slug}', [ItemController::class, 'show'])->middleware('auth');
// Route::get('/home/view-products/create', [ItemController::class, 'create'])->middleware('auth');
// Route::post('/home/view-products/create', [ItemController::class, 'store'])->middleware('auth');
// Route::get('/home/view-products/{item:slug}/edit', [ItemController::class, 'edit'])->middleware('auth');
// Route::patch('/home/view-products/{item:slug}', [ItemController::class, 'update'])->middleware('auth');
// Route::delete('/home/view-products/{item:slug}', [ItemController::class, 'destroy'])->middleware('auth');

Route::resource('/home/view-products', ItemController::class)->parameters([
    'view-products' => 'item:slug'
])->except('index')->middleware('admin');


Route::get('/home/view-transactions', [AdminTransactionController::class, 'index']);
Route::post('/home/view-transaction', [AdminTransactionController::class, 'checkOut'])->name ('checkOut');

// Route::resource('/home/view-transactions', AdminTransactionController::class)->parameters([
//     'view-transaction' => 'transaction:id'
// ])->middleware('admin');


Route::resource('/home/view-accounts', AdminAccountController::class)->parameters([
    'view-accounts' => 'user:id'
])->middleware('admin');

Route::post('/home/my-cart/{id}', [CartController::class, 'addCart'])->name('addCart')->middleware('auth');
// Route::get('/home/my-cart/', [CartController::class, 'index'])->middleware('auth');


Route::resource('/home/my-cart', CartController::class)->parameters([
    'my-cart' => 'cart:id'
])->middleware('auth');
