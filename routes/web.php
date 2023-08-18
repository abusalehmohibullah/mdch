<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\FacilitiesImagesController;
use App\Http\Controllers\Admin\AdvertisementsController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\FacultiesController;
use App\Http\Controllers\Admin\DepartmentsImagesController;
use App\Http\Controllers\Admin\AdministrationsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AlbumsController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\InformationsController;
use App\Http\Controllers\Admin\CKEditorController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Artisan;
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



Route::prefix('education')->group(function () {
    Route::get('/', [HomeController::class, 'education'])->name('home');
});

Route::prefix('education')->group(function () {
    // Route::get('/{section_key}', [HomeController::class, 'show'])->name('section_key')->where('section_key', 'about|facilities|messages|news');
    Route::get('/news', [HomeController::class, 'news'])->name('news.all');
    Route::get('/news/{slug}', [HomeController::class, 'previewNews'])->name('news.preview');

    Route::get('/albums', [HomeController::class, 'albums'])->name('albums');

    Route::get('/about/affiliation', [HomeController::class, 'affiliation'])->name('affiliation');

    Route::get('/about/administrations', [HomeController::class, 'administrations'])->name('administrations');

    Route::get('/about/facilities', [HomeController::class, 'facilities'])->name('facilities');

    Route::get('/facilitiesImages', [HomeController::class, 'facilitiesImages'])->name('facilitiesImages');

    Route::get('/about/{slug}', [HomeController::class, 'sections'])->name('sections');
    Route::get('/bds-course/{slug}', [HomeController::class, 'sections'])->name('sections');
    Route::get('/admission/{slug}', [HomeController::class, 'sections'])->name('sections');

    Route::get('/departments/{slug}', [HomeController::class, 'departments'])->name('departments');

    Route::get('/departments', function () {
        return view('education.departments');
    });
});



Route::get('/entertainment', [HomeController::class, 'entertainment'])->name('entertainment');

// admin panel 
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::group(['middleware' => 'admin_auth'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // Route::get('/update_password', [AdminController::class, 'update_password']);
        Route::get('/logout', function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('error', 'Logout Successfully!');
            return redirect('admin');
        });

        Route::get('/{section_key}', [SectionsController::class, 'index'])->name('admin.section_key')->where('section_key', 'about|administration|office-stuff|affiliation|facilities|messages|bds-course|admission');


        Route::get('/{section_key}/manage/{id?}', [SectionsController::class, 'manage'])->name('admin.sections.manage')->where('section_key', 'about|administration|office-stuff|affiliation|facilities|messages|bds-course|admission');
        Route::post('/{section_key}/process/{id?}', [SectionsController::class, 'process'])->name('admin.sections.process')->where('section_key', 'about|administration|office-stuff|affiliation|facilities|messages|bds-course|admission');


        Route::put('/affiliation/status/{id}', [SectionsController::class, 'status'])->name('admin.sections.status');
        Route::delete('/affiliation/delete/{id}', [SectionsController::class, 'delete'])->name('admin.sections.delete');


        Route::prefix('/facilities/images')->group(function () {
            Route::get('/', [FacilitiesImagesController::class, 'index'])->name('admin.facilitiesImages');
            Route::get('/manage/{id?}', [FacilitiesImagesController::class, 'manage'])->name('admin.facilitiesImages.manage');
            Route::post('/process/{id?}', [FacilitiesImagesController::class, 'process'])->name('admin.facilitiesImages.process');
            Route::delete('/delete/{id?}', [FacilitiesImagesController::class, 'delete'])->name('admin.facilitiesImages.delete');
        });

        Route::prefix('/advertisements')->group(function () {
            Route::get('/', [AdvertisementsController::class, 'index'])->name('admin.advertisements');
            Route::get('/manage/{id?}', [AdvertisementsController::class, 'manage'])->name('admin.advertisements.manage');
            Route::post('/process/{id?}', [AdvertisementsController::class, 'process'])->name('admin.advertisements.process');
            Route::delete('/delete/{id?}', [AdvertisementsController::class, 'delete'])->name('admin.advertisements.delete');
        });

        Route::prefix('faqs')->group(function () {
            Route::get('/', [FaqsController::class, 'index'])->name('admin.faqs');
            Route::get('/manage/{id?}', [FaqsController::class, 'manage'])->name('admin.faqs.manage');
            Route::post('/process/{id?}', [FaqsController::class, 'process'])->name('admin.faqs.process');
            Route::put('/status/{id}', [FaqsController::class, 'status'])->name('admin.faqs.status');
            Route::delete('/delete/{id}', [FaqsController::class, 'delete'])->name('admin.faqs.delete');
        });

        Route::prefix('departments')->group(function () {
            Route::get('/', [DepartmentsController::class, 'index'])->name('admin.departments');
            Route::get('/manage/{id?}', [DepartmentsController::class, 'manage'])->name('admin.departments.manage');
            Route::post('/process/{id?}', [DepartmentsController::class, 'process'])->name('admin.departments.process');
            Route::put('/status/{id}', [DepartmentsController::class, 'status'])->name('admin.departments.status');
            Route::delete('/delete/{id}', [DepartmentsController::class, 'delete'])->name('admin.departments.delete');

            Route::get('/{departmentsId}/faculties', [FacultiesController::class, 'index'])->name('admin.faculties');
            Route::get('/{departmentsId}/faculties/manage/{facultiesId?}', [FacultiesController::class, 'manage'])->where(['departmentsId' => '\d+', 'facultiesId' => '\d*'])->name('admin.faculties.manage');
            Route::post('/{departmentsId}/faculties/process/{facultiesId?}', [FacultiesController::class, 'process'])->name('admin.faculties.process');
            Route::put('/{departmentsId}/faculties/status/{facultiesId?}', [FacultiesController::class, 'status'])->where(['departmentsId' => '\d+', 'facultiesId' => '\d*'])->name('admin.faculties.status');
            Route::delete('/{departmentsId}/faculties/delete/{facultiesId?}', [FacultiesController::class, 'delete'])->name('admin.faculties.delete');

            Route::get('/{departmentsId?}/images', [DepartmentsImagesController::class, 'index'])->where(['departmentsId' => '\d+'])->name('admin.departmentsImages');
            Route::get('/{departmentsId?}/images/manage/{departmentsImagesId?}', [DepartmentsImagesController::class, 'manage'])->where(['departmentsId' => '\d+', 'departmentsImagesId' => '\d*'])->name('admin.departmentsImages.manage');
            Route::post('/{departmentsId}/images/process/{departmentsImagesId?}', [DepartmentsImagesController::class, 'process'])->name('admin.departmentsImages.process');
            Route::delete('/{departmentsId}/images/delete/{departmentsImagesId}', [DepartmentsImagesController::class, 'delete'])->name('admin.departmentsImages.delete');
        });

        Route::prefix('administrations')->group(function () {
            Route::get('/', [AdministrationsController::class, 'index'])->name('admin.administrations');
            Route::get('/manage/{id?}', [AdministrationsController::class, 'manage'])->name('admin.administrations.manage');
            Route::post('/process/{id?}', [AdministrationsController::class, 'process'])->name('admin.administrations.process');
            Route::put('/status/{id}', [AdministrationsController::class, 'status'])->name('admin.administrations.status');
            Route::delete('/delete/{id}', [AdministrationsController::class, 'delete'])->name('admin.administrations.delete');
        });


        Route::prefix('albums')->group(function () {
            Route::get('/', [AlbumsController::class, 'index'])->name('admin.albums');
            Route::get('/manage/{id?}', [AlbumsController::class, 'manage'])->name('admin.albums.manage');
            Route::post('/process/{id?}', [AlbumsController::class, 'process'])->name('admin.albums.process');
            Route::delete('/delete/{id}', [AlbumsController::class, 'delete'])->name('admin.albums.delete');

            Route::get('/{albumId}', [MediaController::class, 'index'])->name('admin.media');
            Route::get('/{albumId}/manage/{mediaId?}', [MediaController::class, 'manage'])->where(['albumId' => '\d+', 'mediaId' => '\d*'])->name('admin.media.manage');
            Route::post('/{albumId}/process/{mediaId?}', [MediaController::class, 'process'])->name('admin.media.process');
            Route::delete('/{albumId}/delete/{mediaId?}', [MediaController::class, 'delete'])->name('admin.media.delete');
        });

        Route::get('/admission', function () {
            return view('admin.admission');
        });

        Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('admin.news');
            Route::get('/manage/{id?}', [NewsController::class, 'manage'])->name('admin.news.manage');
            Route::post('/process/{id?}', [NewsController::class, 'process'])->name('admin.news.process');
            Route::put('/status/{id}', [NewsController::class, 'status'])->name('admin.news.status');
            Route::delete('/delete/{id}', [NewsController::class, 'delete'])->name('admin.news.delete');
            Route::get('/download/{id}', [NewsController::class, 'download'])->name('admin.news.download');
        });


        Route::prefix('settings')->group(function () {
            Route::prefix('informations')->group(function () {
                Route::get('/', [InformationsController::class, 'index'])->name('admin.informations');
                Route::get('/manage/{id?}', [InformationsController::class, 'manage'])->name('admin.informations.manage');
                Route::post('/process/{id?}', [InformationsController::class, 'process'])->name('admin.informations.process');
            });
        });
    });
});


// Route::get('/run-migrations', function () {
//     try {
//         \Artisan::call('migrate');
//         return 'Migrations successfully executed.';
//     } catch (\Exception $e) {
//         return 'Error running migrations: ' . $e->getMessage();
//     }
// });

// Route::get('/clear-cache', function () {
//     try {
//         \Artisan::call('cache:clear');
//         return 'Cache cleared successfully.';
//     } catch (\Exception $e) {
//         return 'Error clearing cache: ' . $e->getMessage();
//     }
// });

// Route::get('/clear-cache-and-seed', function () {
//     try {
//         // Clear cache
//         \Artisan::call('cache:clear');

//         // Run database seed(s)
//         \Artisan::call('db:seed'); // Replace with specific seed command if needed

//         return 'Cache cleared and seeds executed successfully.';
//     } catch (\Exception $e) {
//         return 'Error: ' . $e->getMessage();
//     }
// });

