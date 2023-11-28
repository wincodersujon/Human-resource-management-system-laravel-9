<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\JobGradeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobsHistoryController;
use App\Http\Controllers\RegionController;
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

Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);

Route::post('login_post', [AuthController::class, 'login_post']);
Route::get('logout', [AuthController::class, 'logout']);

// Admin || HR same
Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    //Employees routes->search(find function model)bar,reset,crud
    Route::get('admin/employees', [EmployeesController::class, 'index']);
    Route::get('admin/employees/add', [EmployeesController::class, 'add']);
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'update']);
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);

    //Jobs routes->search(find function model)bar,reset,crud
    Route::get('admin/jobs', [JobsController::class, 'index']);
    Route::get('admin/jobs/add', [JobsController::class, 'add']);
    Route::post('admin/jobs/add', [JobsController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [JobsController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [JobsController::class, 'update']);
    Route::get('admin/jobs/delete/{id}', [JobsController::class, 'delete']);

    /* I included the "maatwebsite/excel" package in the "config/app.php.
    Within my project's "App" directory, I created an "Exports" folder and added a "JobsExports".
    I made some modifications to the "list.blade.php" file in the "Jobs" model.
    The "User," "Jobs" model, and "JobsController"*/
    Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);

    //Job History->Join two or more tables query you can see in JobsHistory.php model with search details.
    Route::get('admin/job_history', [JobsHistoryController::class, 'index']);
    Route::get('admin/job_history/add', [JobsHistoryController::class, 'add']);
    Route::post('admin/job_history/add', [JobsHistoryController::class, 'add_post']);
    Route::get('admin/job_history/edit/{id}', [JobsHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}', [JobsHistoryController::class, 'update']);
    Route::get('admin/job_history/delete/{id}', [JobsHistoryController::class, 'delete']);

    Route::get('admin/job_history_export', [JobsHistoryController::class, 'job_history_export']);

    //Job Grades
    Route::get('admin/job_grades', [JobGradeController::class, 'index']);
    Route::get('admin/job_grades/add', [JobGradeController::class, 'add']);
    Route::post('admin/job_grades/add', [JobGradeController::class, 'add_post']);
    Route::get('admin/job_grades/edit/{id}', [JobGradeController::class, 'edit']);
    Route::post('admin/job_grades/edit/{id}', [JobGradeController::class, 'update']);
    Route::get('admin/job_grades/delete/{id}', [JobGradeController::class, 'delete']);

    //Regions
    Route::get('admin/regions', [RegionController::class, 'index']);
    Route::get('admin/regions/add', [RegionController::class, 'add']);
    Route::post('admin/regions/add', [RegionController::class, 'add_post']);
    Route::get('admin/regions/edit/{id}', [RegionController::class, 'edit']);
    Route::post('admin/regions/edit/{id}', [RegionController::class, 'update']);
    Route::get('admin/regions/delete/{id}', [RegionController::class, 'delete']);

    //Countries
    Route::get('admin/countries', [CountryController::class, 'index']);
    Route::get('admin/countries/add', [CountryController::class, 'add']);
    Route::post('admin/countries/add', [CountryController::class, 'add_post']);
    Route::get('admin/countries/edit/{id}', [CountryController::class, 'edit']);
    Route::post('admin/countries/edit/{id}', [CountryController::class, 'update']);
    Route::get('admin/countries/delete/{id}', [CountryController::class, 'delete']);

    /* I included the "maatwebsite/excel" package in the "config/app.php.
    Within my project's "App" directory, I created an "Exports" folder and added a "CountriesExport".
    I made some modifications to the "list.blade.php" file in the "Country" model.
    The "User," "Country" model, and "CountryController"*/
    Route::get('admin/countries_export', [CountryController::class, 'countries_export']);
});

