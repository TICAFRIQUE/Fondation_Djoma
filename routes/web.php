<?php

use App\Http\Controllers\AproposController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CommandeServiceController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ModuleController;
use App\Http\Controllers\backend\NewsLettersController;
use App\Http\Controllers\backend\ParametreController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\frontend\BaseController;
use App\Http\Controllers\frontend\HebergementController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\frontend\NomDomaineController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;






Route::fallback(function () {
    return view('backend.utility.auth-404-basic');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {

    // login and logout
    Route::controller(AdminController::class)->group(function () {
        route::get('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // page formulaire de connexion
        route::post('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // envoi du formulaire
        route::post('/logout', 'logout')->name('admin.logout');
    });



    // dashboard admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // parametre application
    Route::prefix('parametre')->controller(ParametreController::class)->group(function () {
        route::get('', 'index')->name('parametre.index');
        route::post('store', 'store')->name('parametre.store');
        route::get('maintenance-up', 'maintenanceUp')->name('parametre.maintenance-up');
        route::get('maintenance-down', 'maintenanceDown')->name('parametre.maintenance-down');
        route::get('optimize-clear', 'optimizeClear')->name('parametre.optimize-clear');
        Route::get('download-backup/{file}', 'downloadBackup')->name('setting.download-backup');  // download backup db
    });


    //register admin
    Route::prefix('register')->controller(AdminController::class)->group(function () {
        route::get('', 'index')->name('admin-register.index');
        route::post('store', 'store')->name('admin-register.store');
        route::post('update/{id}', 'update')->name('admin-register.update');
        route::delete('delete/{id}', 'delete')->name('admin-register.delete');
        route::get('profil/{id}', 'profil')->name('admin-register.profil');
        route::post('change-password', 'changePassword')->name('admin-register.new-password');
    });

    //role
    Route::prefix('role')->controller(RoleController::class)->group(function () {
        route::get('', 'index')->name('role.index');
        route::post('store', 'store')->name('role.store');
        route::post('update/{id}', 'update')->name('role.update');
        route::delete('delete/{id}', 'delete')->name('role.delete');
    });

    //permission
    Route::prefix('permission')->controller(PermissionController::class)->group(function () {
        route::get('', 'index')->name('permission.index');
        route::get('create', 'create')->name('permission.create');
        route::post('store', 'store')->name('permission.store');
        route::get('edit{id}', 'edit')->name('permission.edit');
        route::put('update/{id}', 'update')->name('permission.update');
        route::delete('delete/{id}', 'delete')->name('permission.delete');
    });

    //module
    Route::prefix('module')->controller(ModuleController::class)->group(function () {
        route::get('', 'index')->name('module.index');
        route::post('store', 'store')->name('module.store');
        route::post('update/{id}', 'update')->name('module.update');
        route::delete('delete/{id}', 'delete')->name('module.delete');
    });

// galerie

Route::prefix('admin/galerie')->group(function(){
    Route::get('/', [GalerieController::class,'index'])->name('galerie.index');
    Route::post('/store', [GalerieController::class,'store'])->name('galerie.store');
    Route::put('/update/{id}', [GalerieController::class,'update'])->name('galerie.update');
    Route::delete('/delete/{id}', [GalerieController::class,'destroy'])->name('galerie.delete');
});

// Apropos
Route::prefix('admin/apropos')->controller(AproposController::class)->group(function(){
    Route::get('/', 'index')->name('apropos.index');
    Route::post('/store', 'store')->name('apropos.store');
    Route::put('/update/{id}', 'update')->name('apropos.update');
    Route::delete('/delete/{id}', 'destroy')->name('apropos.destroy');
});

// sliders
Route::prefix('admin')->group(function () {
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
    Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
});
});





// FRONTEND 

Route::controller(indexController::class)->group(function(){
    // index
    route::get('/', 'index')->name('index');
    // galerie
    route::get('/galerie', 'galerie')->name('galerie');
});














