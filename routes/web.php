<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// create a route using the Auth::routes() helper
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::prefix('dashboard')->controller(AdminDashboardController::class)->group(function() {
        Route::get('/', 'index')->name('admin.dashboard');
        Route::get('/visitor-stats', 'visitorStats')->name('admin.dashboard.visitor-stats');

    });
});


