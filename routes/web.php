<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/",[HomeController::class,"index"]);

Route::get("/users",[AdminController::class,"user"]);

Route::get("/deleteproducts/{id}",[AdminController::class,"deleteproducts"]);

Route::get("/updateproducts/{id}",[AdminController::class,"updateproducts"]);

Route::post("/update/{id}",[AdminController::class,"update"]);

Route::post("/reservation",[AdminController::class,"reservation"]);

Route::get("/viewreservation",[AdminController::class,"viewreservation"]);

Route::get("/viewbuilder",[AdminController::class,"viewbuilder"]);

Route::post("/uploadbuilder",[AdminController::class,"uploadbuilder"]);

Route::get("/updatebuilder/{id}",[AdminController::class,"updatebuilder"]);

Route::post("/updatepcbuilder/{id}",[AdminController::class,"updatepcbuilder"]);

Route::get("/deletebuilder/{id}",[AdminController::class,"deletebuilder"]);

Route::post("/addcart/{id}",[HomeController::class,"addcart"]);

Route::get("/showcart/{id}",[HomeController::class,"showcart"]);

Route::get("/remove/{id}",[HomeController::class,"remove"]);

Route::get("/product",[AdminController::class,"product"]);

Route::post("/uploadproduct",[AdminController::class,"uploadproduct"]);

Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);

Route::get("/orders",[AdminController::class,"orders"]);

Route::get("/search",[AdminController::class,"search"]);

Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);

Route::get("/redirect",[HomeController::class,"redirect"]);

Route::get('/', function () {
    return view('welcome');
});

Route::get("/",[HomeController::class,"index"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
