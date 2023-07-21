<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DssController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KeycloakController;


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

$proxy_url    = getenv('PROXY_URL');
$proxy_schema = getenv('PROXY_SCHEMA');

if (!empty($proxy_url)) {
    URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
    URL::forceScheme($proxy_schema);
}


Route::get('/UGcKTPxyqsNLp0QXW4XT72NBIbodsogsXK25OJYsxslqRhksNw9lFWYffWHy', function () {
    return view('errors.ie');
})->name('ie');


// Check Browser 
Route::middleware(['agent'])->group(function () {

        Route::get('/', [FrontendController::class,'index']);

        Route::get('/sn', [FrontendController::class, 'sn'])->name('sn');
        Route::get('/data-sn', [FrontendController::class,'getDataSn'])->name('getDataSn');

        Route::get('/st', [FrontendController::class, 'st'])->name('st');
        Route::get('/data-st', [FrontendController::class,'getDataSt'])->name('getDataSt');

        Route::get('/so', [FrontendController::class, 'so'])->name('so');
        Route::get('/data-so', [FrontendController::class,'getDataSo'])->name('getDataSo');

        Route::get('/info-form', function () {
            return view('frontend.info-form');
        });


// Check login by Keycloak 
        Route::group(['middleware' => 'keycloak-web'], function () {
            Route::get('/keycloak/session', [KeycloakController::class, 'keycloakSession']);
        
                Route::prefix('')->group(function () {
                    Route::name('')->group(function () {
                        Route::get('/backend', [DssController::class, 'backendindex'])->name('backendindex');

                        //ViewAdmin
                        Route::get('/backend/viewAdmin', [DssController::class, 'viewAdmin'])->name('viewAdmin');
                        Route::get('/data-admin', [DssController::class,'getDatatablesAdmin'])->name('getDatatablesAdmin');
                        Route::get('/backend/getviewall/{id}', [DssController::class,'getviewall'])->name('getviewall');
                        Route::get('/backend/editAdmin/{id}', [DssController::class, 'viewDetailAdmin'])->name('viewDetailAdmin');
                        Route::post('/backend/editAdmin/', [DssController::class,'editAdmin'])->name('editAdmin');
                        
                        
                        
                    });    
            });
        });

});
