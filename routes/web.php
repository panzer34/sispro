<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\PrescriptionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'login');

Auth::routes();

Route::get('/panel-administrativo', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'admin'])->group(function () {

Route::resource('/specialties', App\Http\Controllers\SpecialtyController::class);
Route::get('/changeStatusb', 'App\Http\Controllers\SpecialtyController@changeStatus');


Route::resource('/supplies', App\Http\Controllers\SupplyController::class);
Route::get('/changeStatusc', 'App\Http\Controllers\SupplyController@changeStatus');

Route::resource('/medicines', App\Http\Controllers\MedicineController::class);
Route::get('/changeStatusa', 'App\Http\Controllers\MedicineController@changeStatus');

Route::resource('/doctors', App\Http\Controllers\DoctorController::class);
Route::get('/doctors/status/{doctor_id}/{status_code}', [App\Http\Controllers\DoctorController::class, 'updateStatus' ])->name('doctors.status.update');


Route::resource('/patients', App\Http\Controllers\PatientController::class);


Route::resource('/appointments', App\Http\Controllers\AppointmentController::class);
Route::get('/changeStatusappointment', 'App\Http\Controllers\AppointmentController@changeStatus');

Route::get('/download-pdf{appointment}', 'App\Http\Controllers\AppointmentController@pdfdown')->name('download-pdf');

Route::resource('/users', App\Http\Controllers\UserController::class);
Route::get('/changeStatususer', 'App\Http\Controllers\UserController@changeStatus');


    
});


Route::middleware(['auth', 'doctor'])->group(function () {

Route::resource('/procedures', App\Http\Controllers\ProcedureController::class);
Route::get('/changeStatus', 'App\Http\Controllers\ProcedureController@changeStatus');


Route::resource('/prescriptions', App\Http\Controllers\PrescriptionController::class);

Route::get('doctor/download-pdfa{prescription}', 'App\Http\Controllers\PrescriptionController@pdfadown')->name('download-pdfa');

Route::resource('/horarios', App\Http\Controllers\HorarioController::class);
    
});





