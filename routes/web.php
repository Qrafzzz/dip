<?php

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
Route::get('/foo', function () {
    Artisan::call('storage:link');
});
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');
Route::get('/employers', [\App\Http\Controllers\IndexController::class, 'indexEmployer'])->name('employer');
Route::get('/resume', [\App\Http\Controllers\ResumeController::class, 'index'])->name('resume.index');
Route::get('/employer', [\App\Http\Controllers\CompanyController::class, 'index'])->name('employer.index');

Route::middleware("auth")->group(function () {
    Route::get('/resume/{author_id}', [\App\Http\Controllers\ResumeController::class, 'show'])->name('resume.show');
    Route::get('/employer/{author_id}', [\App\Http\Controllers\CompanyController::class, 'show'])->name('employer.show');

    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'profileUpdate'])->name('profileUpdate');

    Route::get('/editUser/{email}', [\App\Http\Controllers\Admin\UserController::class, 'editUser'])->name('editUser');
    Route::post('/updateUserSubmit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'updateUserSubmit'])->name('updateUserSubmit');

    Route::get('/resumeRemove', [\App\Http\Controllers\ResumeController::class, 'resume'])->name('resumeRemove');
    Route::post('/updateResume', [\App\Http\Controllers\ResumeController::class, 'updateResume'])->name('updateResume');

    Route::get('/companyRemove', [\App\Http\Controllers\CompanyController::class, 'company'])->name('companyRemove');

    Route::get('/addResponseCompany/{id}', [\App\Http\Controllers\CompanyController::class, 'addResponseCompany'])->name('addResponseCompany');

    Route::get('/addResponseResume/{id}', [\App\Http\Controllers\ResumeController::class, 'addResponseResume'])->name('addResponseResume');

    Route::get('/profileResumeEm', [\App\Http\Controllers\ProfileController::class, 'profileResumeEm'])->name('profileResumeEm');
    Route::get('/profileCompanyEm', [\App\Http\Controllers\ProfileController::class, 'profileCompanyEm'])->name('profileCompanyEm');

    Route::get('/profileResumeRe', [\App\Http\Controllers\ProfileController::class, 'profileResumeRe'])->name('profileResumeRe');
    Route::get('/profileCompanyRe', [\App\Http\Controllers\ProfileController::class, 'profileCompanyRe'])->name('profileCompanyRe');

    Route::post('/createCompany', [\App\Http\Controllers\ProfileController::class, 'createCompany'])->name('createCompany');
    Route::get('/companyAll', [\App\Http\Controllers\ProfileController::class, 'companyAll'])->name('companyAll');
    Route::get('/companyUpdate{id}', [\App\Http\Controllers\ProfileController::class, 'companyUpdate'])->name('companyUpdate');
    Route::post('/companyUpdateSubmit/{id}', [\App\Http\Controllers\ProfileController::class, 'companyUpdateSubmit'])->name('companyUpdateSubmit');
    Route::get('/deleteCompany{id}', [\App\Http\Controllers\ProfileController::class, 'deleteCompany'])->name('deleteCompany');

        Route::group(['prefix' => 'admin'], function () {
            Route::get('/users', [\App\Http\Controllers\Admin\ProfileController::class, 'users'])->name('users');
            Route::get('/company', [\App\Http\Controllers\Admin\ProfileController::class, 'company'])->name('company');
            Route::get('/resume', [\App\Http\Controllers\Admin\ProfileController::class, 'resume'])->name('resume');
            Route::get('/profession', [\App\Http\Controllers\Admin\ProfileController::class, 'profession'])->name('profession');
            Route::post('/createProfession', [\App\Http\Controllers\Admin\ProfileController::class, 'createProfession'])->name('createProfession');
            Route::get('/editProfession/{name}', [\App\Http\Controllers\Admin\ProfileController::class, 'editProfession'])->name('editProfession');
            Route::post('/updateProfessionSubmit/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'updateProfessionSubmit'])->name('updateProfessionSubmit');
            Route::get('/removeProfession/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'removeProfession'])->name('removeProfession');
            Route::get('/category', [\App\Http\Controllers\Admin\ProfileController::class, 'category'])->name('category');
            Route::post('/createCategory', [\App\Http\Controllers\Admin\ProfileController::class, 'createCategory'])->name('createCategory');
            Route::get('/editCategory/{name}', [\App\Http\Controllers\Admin\ProfileController::class, 'editCategory'])->name('editCategory');
            Route::post('/updateCategorySubmit/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'updateCategorySubmit'])->name('updateCategorySubmit');
            Route::get('/removeCategory/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'removeCategory'])->name('removeCategory');

            Route::get('/city', [\App\Http\Controllers\Admin\ProfileController::class, 'city'])->name('city');
            Route::post('/createCity', [\App\Http\Controllers\Admin\ProfileController::class, 'createCity'])->name('createCity');
            Route::get('/editCity/{name}', [\App\Http\Controllers\Admin\ProfileController::class, 'editCity'])->name('editCity');
            Route::post('/updateCitySubmit/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'updateCitySubmit'])->name('updateCitySubmit');
            Route::get('/removeCity/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'removeCity'])->name('removeCity');
        });
});

Route::middleware("guest")->group(function () {
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');

    Route::get('/registerWorker', [\App\Http\Controllers\AuthController::class, 'showRegisterFormWorker'])->name('registerWorker');
    Route::post('/register_processWorker', [\App\Http\Controllers\AuthController::class, 'registerWorker'])->name('register_processWorker');

    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');
});




