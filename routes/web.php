<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

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

Route::get('/', function () {return view('home');})->name('home');

Route::get('serviceOrder', function () {return view('serviceOrder');})->name('serviceOrder');

Route::get('customers', function () {return view('customers');})->name('customers');

Route::get('vehicles', function () {return view('vehicles');})->name('vehicles');

Route::get('parts', function () {return view('parts');})->name('parts');

Route::get('mechanics', function () {return view('mechanics');})->name('mechanics');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/mechanics/create', [MechanicController::class, 'create'])->name('mechanics.create');
Route::post('/mechanics', [MechanicController::class, 'store'])->name('mechanics.store');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/customersCreate', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/mechanics', [MechanicController::class, 'index'])->name('mechanics');
Route::get('/mechanicsCreate', [MechanicController::class, 'create'])->name('mechanics.create');
Route::post('/mechanics', [MechanicController::class, 'store'])->name('mechanics.store');

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles');
Route::get('/vehiclesCreate', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

Route::get('/parts', [PartController::class, 'index'])->name('parts');
Route::get('/partsCreate', [PartController::class, 'create'])->name('parts.create');
Route::post('/parts', [PartController::class, 'store'])->name('parts.store');

Route::get('/serviceOrder', [ServiceOrderController::class, 'index'])->name('serviceOrder');
Route::get('/serviceOrder/{serviceOrder}', [ServiceOrderController::class, 'show'])->name('serviceOrder.show');
Route::get('/serviceOrderCreate', [ServiceOrderController::class, 'create'])->name('serviceOrder.create');
Route::post('/serviceOrder', [ServiceOrderController::class, 'store'])->name('serviceOrder.store');
Route::delete('/service-orders/{id}/delete', [ServiceOrderController::class, 'destroy'])->name('serviceOrder.delete');

Route::get('/serviceTypes', [ServiceTypeController::class, 'index'])->name('serviceTypes');
Route::get('/serviceTypes/{serviceTypes}', [ServiceTypeController::class, 'show'])->name('serviceTypes.show');
Route::get('/serviceTypesCreate', [ServiceTypeController::class, 'create'])->name('serviceTypes.create');
Route::post('/serviceTypes', [ServiceTypeController::class, 'store'])->name('serviceTypes.store');