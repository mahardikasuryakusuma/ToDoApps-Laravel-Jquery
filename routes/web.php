<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalMingguController;
use App\Http\Controllers\JadwalSeninController;
use App\Http\Controllers\JadwalSelasaController;
use App\Http\Controllers\JadwalRabuController;
use App\Http\Controllers\JadwalKamisController;
use App\Http\Controllers\JadwalJumatController;
use App\Http\Controllers\JadwalSabtuController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TugasDeadlineController;
use App\Http\Controllers\TugasDoneController;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\SettingController;




Route::middleware('guest')->group(function (){
    Route::get('/',[LoginController::class,'index'])->name('login');
    Route::post('authenticate',[LoginController::class,'authenticate']);

    Route::get('register',[RegisterController::class,'index']);
    Route::post('registrasi',[RegisterController::class,'register']);
});


Route::middleware('auth')->group(function (){

    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('fetchData',[DashboardController::class,'fetchData']);

    Route::get('minggu-ajax-crud-index', [JadwalMingguController::class,'index']);
    Route::get('minggu-ajax-crud-edit/{id}', [JadwalMingguController::class,'edit']);
    Route::POST('minggu-ajax-crud-store', [JadwalMingguController::class,'store']);
    Route::POST('minggu-ajax-crud-delete/{id}', [JadwalMingguController::class,'destroy']);
    Route::POST('minggu-ajax-crud-update/{id}', [JadwalMingguController::class,'update']);

    Route::get('senin-ajax-crud-index', [JadwalSeninController::class,'index']);
    Route::get('senin-ajax-crud-edit/{id}', [JadwalSeninController::class,'edit']);
    Route::POST('senin-ajax-crud-store', [JadwalSeninController::class,'store']);
    Route::POST('senin-ajax-crud-delete/{id}', [JadwalSeninController::class,'destroy']);
    Route::POST('senin-ajax-crud-update/{id}', [JadwalSeninController::class,'update']);

    Route::get('selasa-ajax-crud-index', [JadwalSelasaController::class,'index']);
    Route::get('selasa-ajax-crud-edit/{id}', [JadwalSelasaController::class,'edit']);
    Route::POST('selasa-ajax-crud-store', [JadwalSelasaController::class,'store']);
    Route::POST('selasa-ajax-crud-delete/{id}', [JadwalSelasaController::class,'destroy']);
    Route::POST('selasa-ajax-crud-update/{id}', [JadwalSelasaController::class,'update']);

    Route::get('rabu-ajax-crud-index', [JadwalRabuController::class,'index']);
    Route::get('rabu-ajax-crud-edit/{id}', [JadwalRabuController::class,'edit']);
    Route::POST('rabu-ajax-crud-store', [JadwalRabuController::class,'store']);
    Route::POST('rabu-ajax-crud-delete/{id}', [JadwalRabuController::class,'destroy']);
    Route::POST('rabu-ajax-crud-update/{id}', [JadwalRabuController::class,'update']);

    Route::get('kamis-ajax-crud-index', [JadwalKamisController::class,'index']);
    Route::get('kamis-ajax-crud-edit/{id}', [JadwalKamisController::class,'edit']);
    Route::POST('kamis-ajax-crud-store', [JadwalKamisController::class,'store']);
    Route::POST('kamis-ajax-crud-delete/{id}', [JadwalKamisController::class,'destroy']);
    Route::POST('kamis-ajax-crud-update/{id}', [JadwalKamisController::class,'update']);

    Route::get('jumat-ajax-crud-index', [JadwalJumatController::class,'index']);
    Route::get('jumat-ajax-crud-edit/{id}', [JadwalJumatController::class,'edit']);
    Route::POST('jumat-ajax-crud-store', [JadwalJumatController::class,'store']);
    Route::POST('jumat-ajax-crud-delete/{id}', [JadwalJumatController::class,'destroy']);
    Route::POST('jumat-ajax-crud-update/{id}', [JadwalJumatController::class,'update']);

    Route::get('sabtu-ajax-crud-index', [JadwalSabtuController::class,'index']);
    Route::get('sabtu-ajax-crud-edit/{id}', [JadwalSabtuController::class,'edit']);
    Route::POST('sabtu-ajax-crud-store', [JadwalSabtuController::class,'store']);
    Route::POST('sabtu-ajax-crud-delete/{id}', [JadwalSabtuController::class,'destroy']);
    Route::POST('sabtu-ajax-crud-update/{id}', [JadwalSabtuController::class,'update']);


    Route::get('tugas-ajax-crud-index', [TugasController::class,'index']);
    Route::get('tugas-ajax-crud-edit/{id}', [TugasController::class,'edit']);
    Route::POST('tugas-ajax-crud-store', [TugasController::class,'store']);
    Route::POST('tugas-ajax-crud-delete/{id}', [TugasController::class,'destroy']);
    Route::post('tugas-ajax-done/{id}', [TugasController::class,'done']);


    Route::get('tugasDone-ajax-crud-index', [TugasDoneController::class,'index']);
    Route::get('tugasDone-ajax-crud-edit/{id}', [TugasDoneController::class,'edit']);
    Route::POST('tugasDone-ajax-crud-store', [TugasDoneController::class,'store']);
    Route::POST('tugasDone-ajax-crud-delete/{id}', [TugasDoneController::class,'destroy']);
    Route::post('tugas-ajax-moveTaskDone/{id}', [TugasDoneController::class,'done']);

    Route::get('about',[DashboardController::class, 'about']);
    Route::get('tugasDeadline-ajax-crud-index', [TugasDeadlineController::class,'index']);
    Route::get('tugasDeadline-ajax-crud-edit/{id}', [TugasDeadlineController::class,'edit']);
    Route::POST('tugasDeadline-ajax-crud-store', [TugasDeadlineController::class,'store']);
    Route::POST('tugasDeadline-ajax-crud-delete/{id}', [TugasDeadlineController::class,'destroy']);
    Route::post('tugas-ajax-doneDeadline/{id}', [TugasDeadlineController::class,'done']);
    Route::GET('setting',[DashboardController::class,'setting']);
    Route::POST('update-password',[SettingController::class,'setting']);
    Route::POST('update-name',[SettingController::class,'name']);
    Route::POST('delete',[SettingController::class,'delete']);

    Route::POST('logout',[LoginController::class,'logout']);
});
