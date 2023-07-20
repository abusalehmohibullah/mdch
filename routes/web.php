<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\NewsController;
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
Route::get('/', [HomeController::class, 'education'])->name('home');;

// routes/web.php



Route::get('/education', [HomeController::class, 'education'])->name('home');
Route::get('/entertainment', [HomeController::class, 'entertainment'])->name('entertainment');

// admin panel 
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    // Route::get('/admin/update_password', [AdminController::class, 'update_password']);
    Route::get('/admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Successfully!');
        return redirect('admin');
    });
    Route::get('/admin/about', function () {
        return view('admin.about');
    });
    Route::get('/admin/facilities', function () {
        return view('admin.facilities');
    });

    Route::get('/admin/faqs', [FaqsController::class, 'index'])->name('faqs');
    Route::get('/admin/faqs/manage/{id?}', [FaqsController::class, 'manage']);
    Route::post('/admin/faqs/process/{id?}', [FaqsController::class, 'process'])->name('faqs.process');
    Route::put('/admin/faqs/status/{id}', [FaqsController::class, 'status'])->name('faqs.status');
    Route::post('/admin/faqs/delete/{id}', [FaqsController::class, 'delete'])->name('faqs.delete');

    Route::get('/admin/image-box', function () {
        return view('admin.image-box');
    });
    Route::get('/admin/messages', function () {
        return view('admin.messages');
    });
    Route::get('/admin/ads', function () {
        return view('admin.ads');
    });
    Route::get('/admin/photo-album', function () {
        return view('admin.photo-album');
    });
    Route::get('/admin/admission', function () {
        return view('admin.admission');
    });

    Route::get('/admin/news', [NewsController::class, 'index'])->name('news');
    Route::get('/admin/news/manage/{id?}', [NewsController::class, 'manage']);
    Route::post('/admin/news/process/{id?}', [NewsController::class, 'process'])->name('news.process');
    Route::put('/admin/news/status/{id}', [NewsController::class, 'status'])->name('news.status');
    Route::post('/admin/news/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');

    Route::get('/admin/opd', function () {
        return view('admin.opd');
    });
});
