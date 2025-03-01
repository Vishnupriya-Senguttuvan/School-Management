<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

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
//     return view('index');
// });

Route::get('/',[StudentController::class,'index'])->name('student.index');
Route::get('students/create',[StudentController::class,'student_create'])->name('student.create');
Route::get('students/show/{id}', [StudentController::class, 'student_show'])->name('student.show');
Route::post('students/store',[StudentController::class,'student_store'])->name('student.store');
Route::get('students/edit/{id}',[StudentController::class,'student_edit'])->name('student.edit');
Route::post('students/update/{id}',[StudentController::class,'student_update'])->name('student.update');
Route::delete('students/destroy/{id}',[StudentController::class,'student_destroy'])->name('student.destroy');

Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::get('admin/create',[AdminController::class,'admin_create'])->name('admin.create');
Route::get('admin/show/{id}',[AdminController::class,'admin_show'])->name('admin.show');
Route::post('admin/store',[AdminController::class,'admin_store'])->name('admin.store');
Route::get('admin/edit/{id}',[AdminController::class,'admin_edit'])->name('admin.edit');
Route::post('admin/update/{id}',[AdminController::class,'admin_update'])->name('admin.update');
Route::delete('admin/destroy/{id}',[AdminController::class,'admin_destroy'])->name('admin.destroy');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.post'); 

