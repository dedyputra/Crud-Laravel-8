<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Landing Page
Route::get('/', function () {
  $jumlahPegawai = Employee::count();
  $jumlahPegawaiCowok = Employee::where('jeniskelamin', 'cowok')->count();
  $jumlahPegawaiCewek = Employee::where('jeniskelamin', 'cewek')->count();

  return view('welcome', compact('jumlahPegawai', 'jumlahPegawaiCowok', 'jumlahPegawaiCewek'));
})->middleware('auth');

// Auth Routes
Route::controller(LoginController::class)->group(function () {
  Route::get('/login', 'login')->name('login');
  Route::post('/loginproses', 'loginproses')->name('loginproses');
  Route::get('/register', 'register')->name('register');
  Route::post('/registeruser', 'registeruser')->name('registeruser');
  Route::get('/logout', 'logout')->name('logout');
});

// Employee Routes (Protected by Auth Middleware)
Route::middleware('auth')->prefix('pegawai')->name('pegawai.')->group(function () {
  Route::get('/', [EmployeeController::class, 'index'])->name('index');
  Route::get('/tambah', [EmployeeController::class, 'tambahpegawai'])->name('tambah');
  Route::post('/insert', [EmployeeController::class, 'insertdata'])->name('insert');
  Route::get('/edit/{id}', [EmployeeController::class, 'tampilkandata'])->name('edit');
  Route::post('/update/{id}', [EmployeeController::class, 'updatedata'])->name('update');
  Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
});
