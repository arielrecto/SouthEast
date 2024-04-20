<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StrandController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\ClassroomController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboardController;
use App\Http\Controllers\Teacher\ProfileController as TeacherProfileController;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware([
    'auth'
])->group(function () {

    Route::middleware(['role:admin'])->prefix('admin')->as('admin.')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::prefix('users')->as('users.')->group(function(){
            Route::get('', [UserController::class, 'index'])->name('index');
            Route::resource('students', StudentController::class);
            Route::resource('teacher', TeacherController::class);
        });
        Route::resource('strands', StrandController::class);
        Route::resource('subjects', SubjectController::class);
    });


    Route::middleware(['role:teacher'])->prefix('teacher')->as('teacher.')->group(function(){
        Route::middleware(['profile.first'])->group(function(){
            Route::get('/dashboard', [TeacherDashboardController::class, 'dashboard'])->name('dashboard');
            Route::resource('classrooms', ClassroomController::class);
        });

        Route::resource('profile', TeacherProfileController::class)->except('index');
    });


});

require __DIR__ . '/auth.php';
