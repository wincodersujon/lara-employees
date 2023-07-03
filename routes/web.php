<?php
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees',[App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('edit/{id}',[App\Http\Controllers\EmployeeController::class, 'edit']);
Route::put('/employees/{id}',[App\Http\Controllers\EmployeeController::class, 'update']);
Route::post('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('destroy');
