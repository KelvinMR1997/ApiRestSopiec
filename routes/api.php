<?php

use Carbon\Factory;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UsersAdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::group middleware auth api es para proteger la api con auth y laravel api_token
// Definición de rutas en laravel 8 Ruote::Metodo('nombreRuta',[NombreController],'Nombre metodo')->name('NombreOpcional')


Route::post('login',[UserLoginController::class, 'login'])->name('login');

// Proteger api
Route::group(['middleware'=>'auth:api'], function(){
    // Todos los metodos del controlador users
    Route::apiResource('/users', App\Http\Controllers\UsersAdminController::class)->except('store');
    // Todos los metodos del controlador items
    Route::apiResource('/items', App\Http\Controllers\ItemsController::class)->except('store');
    // Logout
    Route::post('logout',[UserLoginController::class, 'logout'])->name('logout');
    //Registrar nuevo usuario
    Route::post('/NewUser',[UsersAdminController::class, 'store'])->name('/NewUSer');
    // Registrar nuevo item
    Route::post('/NewItem',[ItemsController::class, 'store'])->name('/NewItem');

});
