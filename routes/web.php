<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

 //Route::get('/verify', [App\Http\Controllers\Auth\VerificationController::class, 'validate']);

// Route::get('/jobs', [App\Http\Controllers\HomeController::class, 'jobs'])->name('jobs');
//Route::get('/careers', [App\Http\Controllers\CareersController::class, 'index']);

Route::view('applied','/admin/jobsapplied');
Route::view('shortlist','/admin/jobshortlist');
Route::view('rejected','/admin/jobsrejected');

Route::view('empapplied','/employee/jobsapplied');
Route::view('empshortlist','/employee/jobshortlist');
Route::view('emprejected','/employee/jobsrejected');


Route::controller(App\Http\Controllers\EmployeeController::class)->group(function () {
  Route::get('/dashboard', 'index');
});

Route::controller(App\Http\Controllers\CareersController::class)->group(function () {
    Route::get('/careers', 'index');
  });

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'index');
  });

//Route::post('/submitjob', [App\Http\Controllers\VacancyController::class, 'store']);
Route::controller(App\Http\Controllers\VacancyController::class)->group(function () {
    Route::get('/createjob', 'create');
    Route::post('/submitjob', 'store');
    Route::get('/jobs', 'show');
    Route::get('/deletejob/{id}', 'destroy');
    Route::get('/editjob/{id}', 'edit');
    Route::post('/updatejob/{id}', 'update')->name('job.update');

    Route::get('/alljobs', 'empshow');

});