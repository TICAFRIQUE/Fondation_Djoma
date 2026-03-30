<?php

use App\Http\Controllers\AproposController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ModuleController;
use App\Http\Controllers\backend\NewsLettersController;
use App\Http\Controllers\backend\ParametreController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\Backend\ProgrammeController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Publiques (Accessibles par tous les visiteurs)
|--------------------------------------------------------------------------
*/

Route::controller(indexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/galerie', 'galerie')->name('galerie');
    
    // Détails (Common-show)
    Route::get('/realisations/{slug}', 'showRealisation')->name('realisations.show');
    Route::get('/projets/{slug}', 'showProjet')->name('projets.show');
    Route::get('/news/{slug}', 'showNews')->name('news.show');
    
    // Listes complètes (List-all)
    Route::get('/realisations', 'allRealisations')->name('realisations.all');
    Route::get('/projets-list', 'allProjets')->name('projets.all');
    Route::get('/actualites', 'allNews')->name('news.all');
});

// Routes d'actions (Agir & Soutenir) - Redirects vers sections
Route::name('agir.')->group(function () {
    Route::get('/donation', fn() => redirect('/#agir'))->name('donation');
    Route::get('/sponsorship', fn() => redirect('/#contact'))->name('sponsorship');
    Route::get('/volunteer', fn() => redirect('/#contact'))->name('volunteer');
});

// Route d'envoi du formulaire de contact (Doit être hors du middleware admin)
Route::post('/contact/store', [ContactMessageController::class, 'store'])->name('contact.store');


/*
|--------------------------------------------------------------------------
| Routes Authentification Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'login')->name('admin.login'); 
    Route::post('/login', 'login'); 
    Route::post('/logout', 'logout')->name('admin.logout')->middleware('admin');
});


/*
|--------------------------------------------------------------------------
| Routes Administration (Protégées par le middleware 'admin')
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Paramètres application
    Route::prefix('parametre')->controller(ParametreController::class)->group(function () {
        Route::get('', 'index')->name('parametre.index');
        Route::post('store', 'store')->name('parametre.store');
        Route::get('maintenance-up', 'maintenanceUp')->name('parametre.maintenance-up');
        Route::get('maintenance-down', 'maintenanceDown')->name('parametre.maintenance-down');
        Route::get('optimize-clear', 'optimizeClear')->name('parametre.optimize-clear');
        Route::get('download-backup/{file}', 'downloadBackup')->name('setting.download-backup');
    });

    // Gestion des Administrateurs
    Route::prefix('register')->controller(AdminController::class)->group(function () {
        Route::get('', 'index')->name('admin-register.index');
        Route::post('store', 'store')->name('admin-register.store');
        Route::post('update/{id}', 'update')->name('admin-register.update');
        Route::delete('delete/{id}', 'delete')->name('admin-register.delete');
        Route::get('profil/{id}', 'profil')->name('admin-register.profil');
        Route::post('change-password', 'changePassword')->name('admin-register.new-password');
    });

    // Roles & Permissions
    Route::prefix('role')->controller(RoleController::class)->group(function () {
        Route::get('', 'index')->name('role.index');
        Route::post('store', 'store')->name('role.store');
        Route::post('update/{id}', 'update')->name('role.update');
        Route::delete('delete/{id}', 'delete')->name('role.delete');
    });

    Route::prefix('permission')->controller(PermissionController::class)->group(function () {
        Route::get('', 'index')->name('permission.index');
        Route::get('create', 'create')->name('permission.create');
        Route::post('store', 'store')->name('permission.store');
        Route::get('edit/{id}', 'edit')->name('permission.edit');
        Route::put('update/{id}', 'update')->name('permission.update');
        Route::delete('delete/{id}', 'delete')->name('permission.delete');
    });

    // Modules
    Route::prefix('module')->controller(ModuleController::class)->group(function () {
        Route::get('', 'index')->name('module.index');
        Route::post('store', 'store')->name('module.store');
        Route::post('update/{id}', 'update')->name('module.update');
        Route::delete('delete/{id}', 'delete')->name('module.delete');
    });

    // Galerie
    Route::prefix('galerie')->group(function () {
        Route::get('/', [GalerieController::class, 'index'])->name('galerie.index');
        Route::post('/store', [GalerieController::class, 'store'])->name('galerie.store');
        Route::put('/update/{id}', [GalerieController::class, 'update'])->name('galerie.update');
        Route::delete('/delete/{id}', [GalerieController::class, 'destroy'])->name('galerie.delete');
    });

    // Apropos
    Route::prefix('apropos')->controller(AproposController::class)->group(function () {
        Route::get('/', 'index')->name('apropos.index');
        Route::post('/store', 'storeApropos')->name('apropos.store');
        Route::put('/update/{id}', 'updateApropos')->name('apropos.update');
        Route::delete('/delete/{id}', 'destroy')->name('apropos.destroy');
    });

    // Sliders
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::post('/', [SliderController::class, 'store'])->name('sliders.store');
        Route::put('/{slider}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
    });

    // Réalisations
    Route::prefix('realisations')->group(function () {
        Route::get('/', [RealisationController::class, 'index'])->name('realisations.index');
        Route::post('/', [RealisationController::class, 'store'])->name('realisations.store');
        Route::put('/{realisation}', [RealisationController::class, 'update'])->name('realisations.update');
        Route::delete('/{realisation}', [RealisationController::class, 'destroy'])->name('realisations.destroy');
        Route::post('/reorder', [RealisationController::class, 'reorder'])->name('realisations.reorder');
    });

    // Projets
    Route::prefix('projets')->group(function () {
        Route::get('/', [ProjetController::class, 'index'])->name('projets.index');
        Route::post('/', [ProjetController::class, 'store'])->name('projets.store');
        Route::put('/{id}', [ProjetController::class, 'update'])->name('projets.update');
        Route::delete('/{id}', [ProjetController::class, 'destroy'])->name('projets.destroy');
    });

    // Gestion des Messages reçus (Admin seulement)
    Route::prefix('messages')->group(function () {
        Route::get('/', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::delete('/{id}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });

    // News (Actualités)
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::post('/', [NewsController::class, 'store'])->name('news.store');
        Route::put('/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    });

    Route::resource('programmes', ProgrammeController::class);

});

/*
|--------------------------------------------------------------------------
| Fallback (Page 404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return view('backend.utility.auth-404-basic');
});