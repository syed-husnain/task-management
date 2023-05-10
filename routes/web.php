<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupTaskController;

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('clear:view');
    return "Cache is cleared";
});

Route::get('/admin-login', function () {
    if (Auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('auth/login');
})->name('AdminLoginFormPage');

Route::get('/home', function () {

});

Route::get('/admin/home', function () {

    return redirect()->route('dashboard');
});
Route::get('/admin/login', function () {

    return redirect()->route('dashboard');
});


Auth::routes();

Route::middleware(['admin'])->group(function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
            Route::post('/get-tasks', [TaskController::class,'getTasks'])->name('get-tasks');
            Route::post('/status', [TaskController::class,'status'])->name('status');
        });
        Route::resource('tasks', TaskController::class);
        Route::resource('groups', GroupController::class);

        Route::group(['prefix' => 'group_tasks', 'as' => 'group_tasks.'], function () {
            Route::post('/get-group-tasks', [GroupTaskController::class,'getGroupTasks'])->name('get-group-tasks');
        });
        Route::resource('group_tasks', GroupTaskController::class);

        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
      
    });
});
