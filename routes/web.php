<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\ImportController;
use App\Models\Convention;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



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
    return view('auth.register');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin')->name('dashboard');
Route::get('/stagiaire_dashboard', [App\Http\Controllers\Stagiaire\DashboardController::class, 'index'])->middleware('role:stagiaire')->name('stagiaire');
Route::get('/encadrant_dashboard', [App\Http\Controllers\Encadrant\DashboardController::class, 'index'])->middleware('role:encadrant')->name('encadrant');
Route::get('/RH_dashboard', [App\Http\Controllers\RH\DashboardController::class, 'index'])->middleware('role:RH')->name('RH');


Auth::routes(['verify' => true]);

Route::middleware(['auth','verified','role:stagiaire'])->group(function() {
    Route::resource('/conventions', App\Http\Controllers\ConventionController::class, [
        'only' => [
            'index', 'store','create','show'
        ]
    ]);


});

// Import encadrants route
Route::middleware(['auth','verified','role:admin'])->group(function() {

    Route::get('file-import', [importController::class, 'fileImportView']);
    Route::post('file-import', [importController::class, 'fileImport'])->name('file-import');

});

Route::middleware ('auth', 'verified')->group (function () {
    Route::resource ('profile',  App\Http\Controllers\ProfileController::class, [
        'only' => ['edit', 'update', 'show']
    ]);
    
});





Route::view('test','pdf');



Route::middleware(['auth','verified'])->group(function () {
    //Routes available to admin and RH
    Route::middleware(['isAdminOrRH'])->group(function () {
      //write route hear 
      Route::resource('/users', App\Http\Controllers\UserManagementController::class);
      Route::get('/Stagiaires', [App\Http\Controllers\UserManagementController::class, 'display_stagiaire'])->name('stagaires');
      Route::get('/Encadrants', [App\Http\Controllers\UserManagementController::class, 'display_encadrant'])->name('encadrants');
      Route::get('/RH', [App\Http\Controllers\UserManagementController::class, 'display_RH'])->name('RHs');
      
      Route::resource('/convention', App\Http\Controllers\ConventionManagementController::class, [
        'only' => [
            'index','edit','update'
        ]
        ]);
      Route::get('/downloadPDF/{id}', [App\Http\Controllers\ConventionManagementController::class, 'downloadPDF'])->name('print');
      Route::get('RIBs/{id}/download', [App\Http\Controllers\ConventionManagementController::class, 'download'])->name('rib.download');
      Route::get('/SendEmail/{id}', [App\Http\Controllers\ConventionManagementController::class, 'SendEmail'])->name('sendemail');




    });
      
    //Routes available to encadrant
    Route::middleware(['role:encadrant'])->group(function () {
      //write route hear 
      Route::resource('/encadrant', App\Http\Controllers\Encadrant\DashboardController::class, [
        'only' => [
            'index', 'update','edit'
        ]
        ]);
    });
});







