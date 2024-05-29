<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SHA1Controller;
use App\Http\Controllers\SHA224Controller;
use App\Http\Controllers\SHA256Controller;
use App\Http\Controllers\SHA384Controller;
use App\Http\Controllers\SHA512Controller;
use App\Http\Controllers\StegController;
use App\Http\Controllers\EncryptionTechniques;
use App\Http\Controllers\Stegadmin_Controller;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return view('pages.dashboard');
});



Route::get('/SHA1', function () {
    return view('pages.SHA1');
});

Route::get('/SHA224', function () {
    return view('pages.SHA224');
});
Route::get('/SHA256', function () {
    return view('pages.SHA256');
});

Route::get('/SHA384', function () {
    return view('pages.SHA384');
});
Route::get('/SHA512', function () {
    return view('pages.SHA512');
});
Route::get('/Steg', function () {
    return view('pages.stegnography');
});


// Import other controllers if necessary

// Import necessary controllers

// Define routes
Route::get('/Steg', [StegController::class, 'steg'])->name('steg');
Route::post('/encode-and-save',[Stegadmin_Controller::class, 'encodeAndSave'])->name('encode-and-save');
Route::post('/decode', [StegController::class, 'decode'])->name('steg.decode');
Route::post('/decrypt', [StegController::class, 'decrypt'])->name('steg.decrypt');











Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// encryption routes
Route::get('/sha1',[EncryptionTechniques::class,'sha1'])->name('sha1.encrypt');
Route::get('/sha224',[EncryptionTechniques::class,'sha224'])->name('sha224.encrypt');
Route::get('/sha256',[EncryptionTechniques::class,'sha256'])->name('sha256.encrypt');
Route::get('/sha384',[EncryptionTechniques::class,'sha384'])->name('sha384.encrypt');
Route::get('/sha512',[EncryptionTechniques::class,'sha512'])->name('sha512.encrypt');
Route::get('/steg',[EncryptionTechniques::class,'steg'])->name('steg.encrypt');
Route::get('/userencode',[EncryptionTechniques::class,'userEncode'])->name('userencode.encode');
Route::get('/userdecode',[EncryptionTechniques::class,'userDecode'])->name('userdecode.decode');
Route::get('/stegencode',[EncryptionTechniques::class,'userEncode'])->name('stegencode.user');




// routes for edit and update and delete.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/stegnography',[Stegadmin_Controller::class,'steg'])->name('steg.login');
Route::get('/encode_admin',[Stegadmin_Controller::class,'encode'])->name('encode_admin.encode');
Route::get('/decode_admin',[Stegadmin_Controller::class,'decode'])->name('decode_admin.decode');




