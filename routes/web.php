<?php

use App\Http\Controllers\anunciosController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\parqueaderoController;
use App\Http\Controllers\reportesController;
use App\Http\Controllers\residenteController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\visitantesController;
use App\Models\visitantes_parqueadero;
use App\Http\Controllers\pagarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reservarController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\reciboController;
use App\Http\Controllers\solicitudController;

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

Route::get('/', function () {return view('welcome');});
Route::get('/celebracion-dia-padre', function () {return view('news.news1');});
Route::get('/consejo-2022', function () {return view('news.news2');});
Route::get('/conoce-app', function () {return view('news.news3');});


Route::middleware(['auth:sanctum', 'verified'])->get('/Anuncios', function () {
})->name('index');


Route::resource('Anuncios', anunciosController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:Vigilante'])->group(function () {
        Route::resource('Visitantes/Parqueadero', parqueaderoController::class);
        Route::get('Visitantes/Parqueadero/notificarResidente/{id}', [parqueaderoController::class, 'notificarResidente'])->name('Parqueadero.notificarResidente');
        Route::post('Visitantes/Parqueadero/{id}', [parqueaderoController::class, 'marcarSalida'])->name('Parqueadero.marcarSalida');
        Route::resource('Visitantes', visitantesController::class);
        Route::get('Visitantes/notificarResidente/{id}', [visitantesController::class, 'notificarResidente'])->name('Visitantes.notificarResidente');
        Route::post('Visitantes/{id}', [visitantesController::class, 'marcarSalida'])->name('Visitantes.marcarSalida');
        Route::get('Visitantes/ReportePdf', [visitantesController::class, 'reportepdf'])->name('reportepdf');
        Route::get('Parqueadero/ReportePdf', [parqueaderoController::class, 'reportepdf'])->name('reportepdf');
    });
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:Aseador|Vigilante'])->group(function () {
        Route::resource('Reportes', reportesController::class);
    });
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:admin|Aseador|Vigilante|residente'])->group(function () {
        Route::resource('profile/index', perfilController::class);
    });
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('Usuarios/Funcionarios', usuariosController::class);
        Route::resource('Usuarios/Residentes', residenteController::class);
        Route::post('Usuarios/Residentes/Notificar/{id}', [residenteController::class, 'notificar'])->name('Residentes.notificar');
        Route::get('Solicitudes/Admin', [solicitudController::class, 'indexadmin'])->name('indexadmin');
        Route::get('Solicitudes/Admin/Revisar/{id}', [solicitudController::class, 'revisar'])->name('Solicitudes.revisar');
        Route::post('Solicitudes/Admin/{id}', [solicitudController::class, 'revisarUpdate'])->name('Solicitudes.revisarUpdate');
        Route::get('Pagos', [reciboController::class, 'indexadmin'])->name('indexadmin');
        Route::get('ReportePdf', [residenteController::class, 'reportepdf'])->name('reportepdf');
        Route::get('Funcionarios/ReportePdf', [usuariosController::class, 'reportepdf'])->name('reportepdf');
        Route::get('ReportePdf/Pagos', [reciboController::class, 'reportepdf'])->name('reportepdf');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:residente'])->group(function () {
        Route::resource('Solicitudes', solicitudController::class);
        Route::resource('MisPagos', reciboController::class);
        Route::get('MisPagos/Pagar/{id}', [reciboController::class, 'datosRecibo'])->name('MisPagos.datosRecibo');
        Route::get('MisPagos/Pagar/Confirmation/{id}/', [reciboController::class, 'confimacionRecibo'])->name('MisPagos.confimacionRecibo');
        Route::post('Solicitudes/Pagar/{id}', [solicitudController::class, 'pagarSolicitud'])->name('Solicitudes.pagarSolicitud');
        Route::get('ReportePdf/MisPagos/{id}', [solicitudController::class, 'generarRecibo'])->name('Solicitudes.generarRecibo');
        Route::get('ReportePdf/MisPagos', [reciboController::class, 'reportepdfUser'])->name('reportepdfUser');
        Route::get('MisReportes', [residenteController::class, 'IndexNotificar'])->name('IndexNotificar');
    });
});

Route::post('Contactanos', [ContactanosController::class, 'send'])->name('Contactanos');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
