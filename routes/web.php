<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\loginController;
use App\Models\Employee;
use Database\Seeders\EmployeeSeeder;

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
  $jumlahpegawai = Employee::count();
  $jumlahpegawaicowok = Employee::where('jeniskelamin', 'cowok')->count();
  $jumlahpegawaicewek = Employee::where('jeniskelamin', 'cewek')->count();

  return view('welcome', compact('jumlahpegawai', 'jumlahpegawaicowok', 'jumlahpegawaicewek'));
})->middleware('auth');

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai')->middleware('auth');

Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');

Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
// Route::get('/editfoto/{id}', [EmployeeController::class, 'editfoto'])->name('foto');

Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/loginproses', [loginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [loginController::class, 'register'])->name('register');
Route::post('/registeruser', [loginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [loginController::class, 'logout'])->name('logout');
