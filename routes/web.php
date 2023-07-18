<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqsController;
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
    Route::get('/admin/faqs/manage', [FaqsController::class, 'faqs_manage']);
    Route::post('/admin/faqs/process', [FaqsController::class, 'faqs_process'])->name('faqs.add');
    Route::put('/admin/faqs/update/{id}', [FaqsController::class, 'faqs_update'])->name('faqs.update');

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
    Route::get('/admin/news', function () {
        return view('admin.news');
    });
    Route::get('/admin/opd', function () {
        return view('admin.opd');
    });
});
