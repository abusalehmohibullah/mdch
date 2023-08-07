<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\MediaController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/sections', function () {
    return view('sections');
});

Route::prefix('education')->group(function () {
    Route::get('/', [HomeController::class, 'education'])->name('home');
});

// Route::get('/{section_key}', [HomeController::class, 'show'])->name('section_key')->where('section_key', 'about|facilities|messages|news');
Route::get('/news', [HomeController::class, 'news'])->name('news.all');
Route::get('/news/{slug}', [HomeController::class, 'previewNews'])->name('news.preview');

Route::get('/entertainment', [HomeController::class, 'entertainment'])->name('entertainment');

// admin panel 
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::group(['middleware' => 'admin_auth'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        // Route::get('/update_password', [AdminController::class, 'update_password']);
        Route::get('/logout', function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('error', 'Logout Successfully!');
            return redirect('admin');
        });

        Route::get('/{section_key}', [SectionsController::class, 'index'])->name('section_key')->where('section_key', 'about|facilities|messages');


        Route::get('/{section_key}/manage/{id?}', [SectionsController::class, 'manage'])->where('section_key', 'about|facilities|messages');
        Route::post('/{section_key}/process/{id?}', [SectionsController::class, 'process'])->name('sections.process')->where('section_key', 'about|facilities|messages');

        Route::put('/status/{id}', [SectionsController::class, 'status'])->name('messages.status');
        Route::delete('/delete/{id}', [SectionsController::class, 'delete'])->name('messages.delete');


        Route::get('/facilities', function () {
            return view('admin.facilities');
        });

        Route::prefix('faqs')->group(function () {
            Route::get('/', [FaqsController::class, 'index'])->name('faqs');
            Route::get('/manage/{id?}', [FaqsController::class, 'manage']);
            Route::post('/process/{id?}', [FaqsController::class, 'process'])->name('faqs.process');
            Route::put('/status/{id}', [FaqsController::class, 'status'])->name('faqs.status');
            Route::delete('/delete/{id}', [FaqsController::class, 'delete'])->name('faqs.delete');
        });

        Route::prefix('departments')->group(function () {
            Route::get('/', [DepartmentsController::class, 'index'])->name('departments');
            Route::get('/manage/{id?}', [DepartmentsController::class, 'manage']);
            Route::post('/process/{id?}', [DepartmentsController::class, 'process'])->name('departments.process');
            Route::put('/status/{id}', [DepartmentsController::class, 'status'])->name('departments.status');
            Route::delete('/delete/{id}', [DepartmentsController::class, 'delete'])->name('departments.delete');
        });

        Route::get('/image-box', function () {
            return view('admin.image-box');
        });

        Route::get('/ads', function () {
            return view('admin.ads');
        });


        Route::prefix('albums')->group(function () {
            Route::get('/', [AlbumsController::class, 'index'])->name('albums');
            Route::get('/manage/{id?}', [AlbumsController::class, 'manage'])->name('albums.manage');
            Route::post('/process/{id?}', [AlbumsController::class, 'process'])->name('albums.process');

            Route::get('/{albumId}', [MediaController::class, 'index'])->name('media');
            Route::get('/{albumId}/manage/{mediaId?}', [MediaController::class, 'manage'])->where(['albumId' => '\d+', 'mediaId' => '\d*'])->name('media.manage');

            Route::post('/{albumId}/process/{mediaId?}', [MediaController::class, 'process'])->name('media.process');
            
            Route::delete('/delete/{id}', [AlbumsController::class, 'delete'])->name('albums.images.delete');
            Route::delete('/destroy/{id}', [AlbumsController::class, 'destroy'])->name('albums.destroy');
            Route::get('/download/{id}', [AlbumsController::class, 'download'])->name('albums.download');
        });

        Route::get('/admission', function () {
            return view('admin.admission');
        });

        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('news');
            Route::get('/manage/{id?}', [NewsController::class, 'manage']);
            Route::post('/process/{id?}', [NewsController::class, 'process'])->name('news.process');
            Route::put('/status/{id}', [NewsController::class, 'status'])->name('news.status');
            Route::delete('/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');
            Route::get('/download/{id}', [NewsController::class, 'download'])->name('news.download');
        });


        Route::get('/opd', function () {
            return view('admin.opd');
        });
    });
});
