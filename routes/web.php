<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AppointmentsController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', [UserController::class, "login"])->name("login")->middleware("guest");
Route::post('/admin/logout', [UserController::class, "logout"])->middleware("auth");
Route::get('/dashboard', [UserController::class, "dashboard"])->middleware("auth");
Route::get('/dashboard/{year}', [UserController::class, "dashboard"])->middleware("auth");
Route::post('/admin/auth', [UserController::class, "auth"])->middleware("guest");


Route::get("/patients/show/{patient}", [PatientsController::class, "showapps"])->middleware("auth");
Route::resource("Appointments", AppointmentsController::class)->middleware("auth");
Route::resource("patients", PatientsController::class)->middleware("auth");

Route::post("/Appointments/showapps", [AppointmentsController::class, "showapps"])->middleware("auth");