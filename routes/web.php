<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Visitor\VisitorController;
use Illuminate\Support\Facades\Auth;
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
Route::prefix('/')->controller(VisitorController::class)->group(function() {
    Route::get('/', 'index')->name('visitor.index');
    Route::get('/{page:slug}', 'fetch_page')->name('visitor.fetch_page');
});


Auth::routes();

Route::prefix('web_management')->controller(LoginController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('admin.login');
    Route::post('/login', 'login')->name('admin.login');
    Route::post('/logout', 'logout')->name('admin.logout');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::prefix('web_management')->controller(AdminDashboardController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
        Route::get('/visitor-stats', 'visitorStats')->name('admin.dashboard.visitor-stats');
    });
});


// create a route using the Auth::routes() helper
