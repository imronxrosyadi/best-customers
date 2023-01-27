<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\CustomerEvaluationController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('auth.login');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;

Route::post('/register', [RegisterController::class, 'store']);



Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('auth');
    // Customers service
    Route::resource('customers', CustomerController::class);
    Route::get('/customers/delete/{id}', [CustomerController::class, 'delete']);
    // Criterias service
    Route::resource('criterias', CriteriaController::class);
    Route::get('/criterias/delete/{id}', [CriteriaController::class, 'delete']);
    // Subcriterias service
    Route::resource('sub-criterias', SubCriteriaController::class);
    Route::get('/sub-criterias/delete/{id}', [SubCriteriaController::class, 'delete']);
    Route::get('/sub-criterias/{criteriaId}/create', [SubCriteriaController::class, 'add'])->name('add');
    // Evaluation service
    Route::resource('evaluations', CustomerEvaluationController::class);
    Route::get('/evaluations/delete/{id}', [CustomerEvaluationController::class, 'delete']);
    Route::get('/calculates/report', [CalculateController::class, 'report']);
    Route::get('/calculates/report/decree', [CalculateController::class, 'decree']);
    Route::resource('calculates', CalculateController::class);

});
