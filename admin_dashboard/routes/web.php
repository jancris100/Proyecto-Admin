<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SecurityController;
use App\Http\Middleware\AuthenticateDashboard;

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
Route::get('loginForm', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware([AuthenticateDashboard::class])->group(function () {
    //RUTA PRINCIPAL O CUALQUIERA
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    //RUTA DEL DASHBOARD
    Route::get('/dashboard', [PanelController::class, 'index'])->name('panel.dashboard');
    //RUTA PARA ACERCA DE
    Route::get('/about', [PanelController::class, 'about'])->name('panel.about');
    //RUTA DEL ADMIN
    Route::get('/Admin', function () {
        return view('welcome');
    });

    //RUTAS PARA EL ROLES
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
    //RUTA DE LOS JOB POSITIONS
    Route::prefix('job_positions')->group(function () {
        Route::get('/', [JobPositionController::class, 'index'])->name('job_positions.index');
        Route::get('/create', [JobPositionController::class, 'create'])->name('job_positions.create');
        Route::post('/', [JobPositionController::class, 'store'])->name('job_positions.store');
        Route::get('/{jobPosition}/edit', [JobPositionController::class, 'edit'])->name('job_positions.edit');
        Route::put('/{jobPosition}', [JobPositionController::class, 'update'])->name('job_positions.update');
        Route::delete('/{jobPosition}', [JobPositionController::class, 'destroy'])->name('job_positions.destroy');
    });
    //RUTA DE LOS USUARIOS
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'myAccountUpdate'])->name('users.myAccountUpdate');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    //RUTAS DE SEGURIDAD
    Route::group(['prefix' => 'security'], function () {
        Route::get('/ingresos-salidas', [SecurityController::class, 'index_ingresos_salidas'])->name('security.index_ingresos_salidas');
        Route::get('/movimientos', [SecurityController::class, 'index_movimientos'])->name('security.index_movimientos');
    });

});

