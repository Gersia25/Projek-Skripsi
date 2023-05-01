<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DataSekolah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanSiswa;
use App\Http\Controllers\ThaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BlankoController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\Api\MapelController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataExtraController;
use App\Http\Controllers\DataMapelController;
use App\Http\Controllers\GuruExtraController;
use App\Http\Controllers\GuruMapelController;
use App\Http\Controllers\NaikKelasController;
use App\Http\Controllers\DataKepsekController;
use App\Http\Controllers\NilaiExtraController;
use App\Http\Controllers\ModelRaportController;
use App\Http\Controllers\HalamanSiswaController;

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
    return view('auth/login');
});

Auth::routes();
// data admin routes
#Route::resource('/data-admin',DataAdminController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route mapel
Route::resource('/data-mapel', DataMapelController::class);

// route extra
Route::resource('/data-extra', DataExtraController::class);

//route kelas
Route::resource('/data-kelas',KelasController::class);
Route::get('/lihat-siswa/{id}', [App\Http\Controllers\KelasController::class, 'view_siswa']);

//route tahun ajaran
Route::resource('/data-tha',ThaController::class);

// route guru
Route::resource('/data-guru',GuruController::class);

//route siswa
Route::resource('/data-siswa',SiswaController::class);

//route user 
Route::resource('/data-user',UserController::class);

//route blanko presensi
Route::resource('/cetak-blanko',BlankoController::class);
Route::get('/print-blanko/{id}', [App\Http\Controllers\BlankoController::class, 'print_blanko']);

//route profil sekolah
Route::resource('data-sekolah',DataSekolah::class);

//route format rapor
Route::resource('format-raport',ModelRaportController::class);
Route::get('/format-raport-1/{id}', [App\Http\Controllers\ModelRaportController::class, 'format_raport_1']);
Route::get('/format-raport-2/{id}', [App\Http\Controllers\ModelRaportController::class, 'format_raport_2']);


//route nilai mapel
Route::resource('data-nilai',NilaiController::class);
Route::post('data-nilai/get-nilai',[App\Http\Controllers\NilaiController::class,'get_nilai']);
Route::post('data-nilai/input-nilai',[App\Http\Controllers\NilaiController::class,'input_nilai']);
Route::post('data-nilai/update-nilai',[App\Http\Controllers\NilaiController::class,'update_nilai']);

//route nilai extra
Route::resource('data-nilai-extra',NilaiExtraController::class);
Route::post('data-nilai-extra/get-nilai-extra',[App\Http\Controllers\NilaiExtraController::class,'get_nilai_extra']);
Route::post('data-nilai-extra/input-nilai-extra',[App\Http\Controllers\NilaiExtraController::class,'input_nilai_extra']);
Route::post('data-nilai-extra/hapus-nilai-extra',[App\Http\Controllers\NilaiExtraController::class,'hapus_nilai_extra']);
Route::post('data-nilai-extra/hapus-nilai-extra2',[App\Http\Controllers\NilaiExtraController::class,'hapus_nilai_extra2']);


//route set kehadiran siswa
Route::get('data-kehadiran-siswa',[App\Http\Controllers\RaportController::class,'data_kehadiran_siswa']);
Route::get('data-kehadiran-siswa/{id}',[App\Http\Controllers\RaportController::class,'data_kehadiran_siswa_show']);
Route::get('set-data-kehadiran/{id}',[App\Http\Controllers\RaportController::class,'set_data_kehadiran']);
Route::post('update-kehadiran/{id}',[App\Http\Controllers\RaportController::class,'update_kehadiran']);

//route cetak rapor
Route::get('cetak-raport',[App\Http\Controllers\RaportController::class,'cetak_raport']);
Route::post('print-raport',[App\Http\Controllers\RaportController::class,'print_raport']);

//route cetakraporsiswa
Route::get('raport-saya',[HalamanSiswa::class,'raport_saya']);
Route::post('print-raport-saya',[HalamanSiswa::class,'print_raport']);

//route naik kelas (walkelas)
Route::resource('naik-kelas',NaikKelasController::class);


// // API

// Route::apiResource('/mata-pelajaran',MapelController::class);