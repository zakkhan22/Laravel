<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LectureController;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;
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
 
Auth::routes(["login" => false, "register" => false] );


Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login');
Route::get('/login/student', [LoginController::class,'showStudentLoginForm']);
Route::get('/login/teacher', [LoginController::class,'showTeacherLoginForm']);
Route::get('/register', [RegisterController::class,'showAdminRegisterForm'])->name('register');
//Route::get('/register/student', [RegisterController::class,'showStudentRegisterForm'])->middleware('auth');
//Route::get('/register/teacher', [RegisterController::class,'showTeacherRegisterForm'])->middleware('auth');

Route::post('/login', [LoginController::class,'adminLogin']);
Route::post('/login/student', [LoginController::class,'studentLogin']);
Route::post('/login/teacher', [LoginController::class,'teacherLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/student', [RegisterController::class,'createStudent']);
Route::post('/register/teacher', [RegisterController::class,'createTeacher']);

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::group(['middleware' => 'auth:student'], function () {
    Route::view('/student', 'student.lectures');
});

Route::group(['middleware' => 'auth:teacher'], function () {
    Route::view('/teacher', 'teacher.lectures');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/register/student',[StudentController::class,'create']);
Route::post('/admin/register/student',[StudentController::class,'store'])->name('admin.register.student');
Route::get('/admin/register/teacher',[TeacherController::class,'create']);
Route::post('/admin/register/teacher',[TeacherController::class,'store'])->name('admin.register.teacher');
Route::get('/admin/register/lecture', [LectureController::class, 'create']);
Route::post('/admin/register/lecture', [LectureController::class, 'store'])->name('admin.register.lecture');
Route::get('/admin/lecture/{id}',[StudentController::class,'assign']);
Route::post('/admin/lecture/{id}',[StudentController::class,'register_to_lecture']);