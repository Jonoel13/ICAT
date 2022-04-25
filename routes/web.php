<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::any('registro/alt', [App\Http\Controllers\Admin\Certification\StandardController::class, 'registro']);
Route::any('registro/estandard/{name}', [App\Http\Controllers\User\EnrollController::class, 'standardEnroll']);

Route::any('registro/buscar/usuario', [App\Http\Controllers\User\EnrollController::class, 'searchUser']);
Route::any('registro/curp', [App\Http\Controllers\User\EnrollController::class, 'crupEnroll']);
Route::any('registro/email', [App\Http\Controllers\User\EnrollController::class, 'emailEnroll']);

Route::any('registro', [App\Http\Controllers\User\EnrollController::class, 'formCertification']);
Route::any('registro/guardar', [App\Http\Controllers\User\EnrollController::class, 'store']);
Route::any('registro/guardar/alt', [App\Http\Controllers\User\EnrollController::class, 'enroll']);
Route::any('registro/rapido', [App\Http\Controllers\User\EnrollController::class, 'fastEnroll']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::any('pruebas', [App\Http\Controllers\HomeController::class, 'test']);
Route::any('pruebas/delete/{name}', [App\Http\Controllers\HomeController::class, 'delete']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('usuarios', [App\Http\Controllers\Admin\User\ProfileController::class, 'index']);
Route::any('usuarios/{id}', [App\Http\Controllers\Admin\User\ProfileController::class, 'formPassword']);
Route::any('usuarios/password/{id}', [App\Http\Controllers\Admin\User\ProfileController::class, 'updatePassword']);

Route::any('admin/usuarios/perfiles/', [App\Http\Controllers\Admin\User\ProfileController::class, 'profiles']);
Route::any('admin/usuarios/perfiles/eliminar/{id}', [App\Http\Controllers\Admin\User\ProfileController::class, 'deleteProfile']);

Route::get('admin/estandar/lista', [App\Http\Controllers\Admin\Certification\StandardController::class, 'index']);
Route::get('admin/estandar/from', [App\Http\Controllers\Admin\Certification\StandardController::class, 'form']);
Route::any('admin/estandar/guardar', [App\Http\Controllers\Admin\Certification\StandardController::class, 'store']);
Route::any('admin/estandar/edit/{id}', [App\Http\Controllers\Admin\Certification\StandardController::class, 'edit']);
Route::any('admin/estandar/update/{id}', [App\Http\Controllers\Admin\Certification\StandardController::class, 'update']);
Route::any('admin/estandar/delete/{id}', [App\Http\Controllers\Admin\Certification\StandardController::class, 'delete']);


Route::get('admin/groups/lista', [App\Http\Controllers\Admin\Standard\GroupsController::class, 'index']);
Route::any('admin/groups/form', [App\Http\Controllers\Admin\Standard\GroupsController::class, 'form']);
Route::any('admin/groups/guardar', [App\Http\Controllers\Admin\Standard\GroupsController::class, 'store']);
Route::any('admin/groups/edit/{id}', [App\Http\Controllers\Admin\Standard\GroupsController::class, 'edit']);
Route::any('admin/groups/update/{id}', [App\Http\Controllers\Admin\Standard\GroupsController::class, 'update']);
Route::any('admin/groups/delete/{id}', [App\Http\Controllers\Admin\Standard\GroupsController::class, 'delete']);


Route::get('admin/instructor/lista', [App\Http\Controllers\Admin\User\InstructorsController::class, 'index']);
Route::any('admin/instructor/form', [App\Http\Controllers\Admin\User\InstructorsController::class, 'form']);
Route::any('admin/instructor/guardar', [App\Http\Controllers\Admin\User\InstructorsController::class, 'store']);
Route::any('admin/instructor/edit/{id}', [App\Http\Controllers\Admin\User\InstructorsController::class, 'edit']);
Route::any('admin/instructor/update/{id}', [App\Http\Controllers\Admin\User\InstructorsController::class, 'update']);
Route::any('admin/instructor/delete/{id}', [App\Http\Controllers\Admin\User\InstructorsController::class, 'delete']);

Route::any('admin/certificaciones/lista', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'adminList']);
Route::any('admin/certificaciones/delete/{id}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'delete']);
Route::any('admin/certificaciones/edit/{id}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'editCert']);


Route::get('certificaciones', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'index']);
Route::get('certificaciones/{curp}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'edit']);
Route::any('certificaciones/edit/{curp}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'update']);


Route::get('certificados', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'certifylist']);
Route::get('certificado/{id}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'uploadCertify']);
Route::any('certificado/guardar/{id}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'storeCertify']);

Route::any('candidatos', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'indexEnroll']);
Route::any('candidatos/edit/{id}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'enrollFind']);
Route::any('candidatos/{id}', [App\Http\Controllers\Admin\Certification\CertificationController::class, 'findCertification']);


Route::any('agenda', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'index']);
Route::any('agenda/buscar/{date}', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'search']);
Route::any('agenda/{id}', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'find']);
Route::any('agenda/edit/{id}', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'edit']);
Route::any('citas/lista', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'quotes']);
Route::any('citas/{id}', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'quoteFind']);
Route::any('citas/edit/{id}', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'quoteEdit']);


Route::any('banco/perfiles', [App\Http\Controllers\Admin\User\BankController::class, 'index']);
Route::any('nuevo', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'form']);
Route::any('nuevo/citas/crear', [App\Http\Controllers\Admin\Certification\ScheduleController::class, 'store']);

Route::any('citas', [App\Http\Controllers\Certification\QuoteController::class, 'form']);
Route::any('citas/buscar', [App\Http\Controllers\Certification\QuoteController::class, 'search']);
Route::any('citas/guardar', [App\Http\Controllers\Certification\QuoteController::class, 'store']);
Route::any('citas/consulta/{id}', [App\Http\Controllers\Certification\QuoteController::class, 'search']);
Route::any('citas/cancelar/{id}', [App\Http\Controllers\Certification\QuoteController::class, 'delete']);


Route::any('fechas', [App\Http\Controllers\Certification\QuoteController::class, 'dates']);
Route::any('fechas/id', [App\Http\Controllers\Certification\QuoteController::class, 'datesById']);



Route::any('api/documentacion', [App\Http\Controllers\Api\ApiCertificationController::class, 'documentation']);
Route::any('api/curp/{curp}', [App\Http\Controllers\Api\ApiCertificationController::class, 'getByCurp']);
Route::any('api/certificaciones', [App\Http\Controllers\Api\ApiCertificationController::class, 'getAll']);
Route::any('api/perfiles/{sector}', [App\Http\Controllers\Api\ApiCertificationController::class, 'getAll']);


Route::any('usuario/perfil/{curp}', [App\Http\Controllers\User\ProfileController::class, 'index']);
Route::any('usuario/formulario', [App\Http\Controllers\User\ProfileController::class, 'form']);
Route::any('usuario/editar/{id}', [App\Http\Controllers\User\ProfileController::class, 'edit']);
Route::any('usuario/actualizar/{id}', [App\Http\Controllers\User\ProfileController::class, 'update']);
Route::any('usuario/preguntas', [App\Http\Controllers\User\ProfileController::class, 'info']);


Route::any('usuario/citas', [App\Http\Controllers\Certification\QuoteController::class, 'formLog']);
Route::any('usuario/citas/{day}', [App\Http\Controllers\Certification\QuoteController::class, 'formResponse']);


Route::any('usuario/citas/agendar/cita', [App\Http\Controllers\Certification\QuoteController::class, 'storeLog']);
Route::any('usuario/pago/actualizar', [App\Http\Controllers\Payments\PayController::class, 'payUpdate']);

Route::any('usuario/diagnostico/guardar', [App\Http\Controllers\User\ProfileController::class, 'diagnostico']);

Route::any('usuario/certificaciones/{id}', [App\Http\Controllers\User\CertificationController::class, 'index']);


Route::any('usuario/capacitaciones/{id}', [App\Http\Controllers\User\CapacitationController::class, 'index']);



Route::any('pagos', [App\Http\Controllers\Payments\PayController::class, 'index']);
Route::any('pagos/buscar/{curp}', [App\Http\Controllers\Payments\PayController::class, 'payByCurp']);
Route::any('pago/guardar', [App\Http\Controllers\Payments\PayController::class, 'store']);
Route::any('pago/{id}', [App\Http\Controllers\Payments\PayController::class, 'show']);
Route::any('pago/actualizar/{id}', [App\Http\Controllers\Payments\PayController::class, 'update']);


Route::any('documentos', [App\Http\Controllers\User\ProfileController::class, 'docs']);
Route::any('documentos/editar/{id}', [App\Http\Controllers\User\ProfileController::class, 'showDocs']);
Route::any('documentos/actualizar/{id}', [App\Http\Controllers\User\ProfileController::class, 'updateDocs']);

Route::any('documentos/constancia/{curp}/{id}', [App\Http\Controllers\User\EnrollController::class, 'constancia']);

Route::any('documentos/constancia/{curp}/{id}', [App\Http\Controllers\User\EnrollController::class, 'constancia']);
