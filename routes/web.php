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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {    
    // if (!Auth::user()->hasPermission('dashboard-access')){
    //     Route::get('/', Client\Chats::class)->name('home');
    // }
    // else{
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // }
    // Route::group(['middleware' => ['role:client']], function () {
    //     Route::resource('chats', Client\Chats::class);
    // });

    Route::resource('clients', ClientsController::class);
    Route::resource('lead', InvoicesController::class);
    Route::resource('project', ProjectsController::class);
    Route::resource('task', TasksController::class);
    Route::resource('subtask', SubtaskController::class);
    Route::resource('brand', BrandsController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('package', PackagesController::class);
    Route::resource('user', UserController::class);
    Route::resource('logobreif', LogoBreifController::class);
    Route::resource('webbreif', WebBreifController::class);

    Route::resource('profile', HomeController::class);


    Route::any('create/{name}/{id}', [App\Http\Controllers\ProjectsController::class, 'asignproject']);
    Route::any('clientregister/{id}', [App\Http\Controllers\ClientsController::class, 'clientregister']);
    Route::any('{id}/lead', [App\Http\Controllers\ClientsController::class, 'lead']);
    Route::get('leadstaatus/{id}/{status}', [App\Http\Controllers\InvoicesController::class, 'leadstatus']);
    Route::get('taskproject/{id}', [App\Http\Controllers\TasksController::class, 'taskproject']);
    Route::get('tasknotify/{id}/{notify}', [App\Http\Controllers\TasksController::class, 'tasknotify']);
    Route::get('subtaskbyid/{id}', [App\Http\Controllers\SubtaskController::class, 'subtaskbyid']);

    Route::get('file-export/{id}', [App\Http\Controllers\ClientsController::class, 'fileExport'])->name('file-export');
});


// Route::group(['middleware' => ['role:client']], function () {
    //     Route::resource('chats', Client\Chats::class);
    //     Route::any('invoice/{id}', [App\Http\Controllers\ClientsController::class, 'show']);
    //     // Route::get('lead/{id}', [App\Http\Controllers\InvoicesController::class, 'show']);   
//     Route::resource('breif', Client\BreifProjectController::class);
// });