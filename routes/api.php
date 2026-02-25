<?php

// Importar controladores
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\EstatusController;
use App\Http\Controllers\Api\CentrosreciclajeController;
use App\Http\Controllers\Api\TiporesiduoController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\GuiasseparacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    //Api para logearse usando el username y la password
    Route::post('login', [AuthController::class, 'login']);
    //Api para cerrar sesión y destruir el JWT se requiere el token para usarla
    Route::post('logout', [AuthController::class, 'logout']);
    //Api para obtener un nuevo token se requiere el token viejo
    Route::post('refresh', [AuthController::class, 'refresh']);
    //Api que te retorna el usuario logeado
    Route::post('me', [AuthController::class, 'me']);

});

    Route::get('usuarios', [\App\Http\Controllers\Api\UsuarioController::class, 'usuarios']);
    Route::get('roles', [\App\Http\Controllers\Api\RolController::class, 'roles']);
    Route::get('estatus', [\App\Http\Controllers\Api\EstatusController::class, 'estatus']);
    Route::post('register', [\App\Http\Controllers\Api\UsuarioController::class, 'registrar']);
    Route::post('updateUser', [\App\Http\Controllers\Api\UsuarioController::class, 'edit']);


// Rutas API generadas automáticamente
Route::apiResource('reportes', ReportController::class);
Route::apiResource('estatus', EstatusController::class);
Route::apiResource('centrosreciclaje', CentrosreciclajeController::class);
Route::apiResource('tiporesiduo', TiporesiduoController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('roles', RolController::class)
    ->parameters(['roles' => 'rol']);
Route::apiResource('guiasseparacion', GuiasseparacionController::class);
