<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Dashbord\AdminLoginController;
use App\Http\Controllers\Dashbord\brandController;
use App\Http\Controllers\Dashbord\DashbordConrtroller;
use App\Http\Controllers\Dashbord\MainCategories;
use App\Http\Controllers\Dashbord\subCagegories;
use App\Http\Controllers\Dashbord\vendorsController;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale()  . "/admin",
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        //login route

Route::get('/login', [AdminLoginController::class, 'loginPage'])->name('admin.login');
Route::post('checkLogin', [AdminLoginController::class, 'checkLogin'])->name('admin.checkLogin');

//        login done
    Route::group(['middleware'=>'auth:admin'],function(){
        Route::get('/', [DashbordConrtroller::class, 'index'])->name('Dashbord');


        // categories routes

    Route::group(['prefix' => 'categories'],function(){

        Route::get('/{type?}/', [MainCategories::class, 'view'])                 ->name('admin.categories');
        Route::get('/type/{type?}/{action?}', [MainCategories::class, 'select'])     ->name('admin.selectCategories');
        Route::get('/detail/{type?}/{id?}', [MainCategories::class, 'detail'])     ->name('admin.detailCategories');
        Route::get('/create/{type?}', [MainCategories::class, 'createForm'])     ->name('admin.createFormCategories');
        Route::post('/store/{type?}', [MainCategories::class, 'storeDb'])        ->name('admin.storeCategories');
        Route::get('edit/{type?}/{slug?}', [MainCategories::class, 'editForm'])    ->name('admin.editCategories');
        Route::post('/update/{type?}/{id?}', [MainCategories::class, 'updateDb'])->name('admin.updateCategories');
        Route::get('/delete/{type?}/{id?}', [MainCategories::class, 'delete'])   ->name('admin.deleteCategories');
        Route::get('/isActive/{type?}/{id?}', [MainCategories::class, 'isActive'])->name('admin.activeCategories');
    });

    // brands routes

    Route::group(['prefix' => 'brand'],function(){

        Route::get('/', [brandController::class, 'view'])                 ->name('admin.brands');
        Route::get('/type/{action?}', [brandController::class, 'select'])     ->name('admin.selectBrands');
        Route::get('/detail/{id?}', [brandController::class, 'detail'])     ->name('admin.detailBrands');
        Route::get('/create', [brandController::class, 'createForm'])     ->name('admin.createFormBrands');
        Route::post('/store', [brandController::class, 'storeDb'])        ->name('admin.storeBrands');
        Route::get('edit/{id?}', [brandController::class, 'editForm'])    ->name('admin.editBrands');
        Route::post('/update/{id?}', [brandController::class, 'updateDb'])->name('admin.updateBrands');
        Route::get('/delete/{id?}', [brandController::class, 'delete'])   ->name('admin.deleteBrands');
        Route::get('/isActive/{id?}', [brandController::class, 'isActive'])->name('admin.activeBrands');
    });

    Route::group(['prefix' => 'vendors'],function(){

        Route::get('/', [vendorsController::class, 'view'])                       ->name('admin.vendors');
        Route::get('/&{action?}', [vendorsController::class, 'select'])                       ->name('admin.selectvendors');
        Route::get('/add', [vendorsController::class, 'addForm'])                 ->name('admin.addvendors');
        Route::post('/addvendorscheck', [vendorsController::class, 'addCheck'])  ->name('admin.addvendorscheck');
        Route::get('/edit/{id?}', [vendorsController::class, 'editForm'])               ->name('admin.editvendors');
        Route::post('/editdone/{id?}', [vendorsController::class, 'editCheck'])->name('admin.editvendorscheck');
        Route::get('/deletevendors/{id?}', [vendorsController::class, 'deleteVendors'])->name('admin.deleteVendors');
        Route::get('/activeVendors/{id?}', [vendorsController::class, 'activeVendors'])->name('admin.activeVendors');

    });
    Route::group(['prefix' => 'sub-categories'],function(){

        Route::get('/', [subCagegories::class, 'view'])                            ->name('admin.viewsubcategories');
        Route::get('/&{action?}', [subCagegories::class, 'select'])                       ->name('admin.selectsubcategories');
        Route::get('/add', [subCagegories::class, 'addForm'])                      ->name('admin.addsubcategories');
        Route::post('/addSubCategorecheck', [subCagegories::class, 'addCheck'])       ->name('admin.addsubcategoriescheck');
        Route::get('edit/{id?}', [subCagegories::class, 'editForm'])                    ->name('admin.editsubcategories');
        Route::post('/editSubCategoreCheck/{id?}', [subCagegories::class, 'editCheck'])     ->name('admin.editsubcategoriescheck');
        Route::get('/deleteSubCat/{id?}', [subCagegories::class, 'deletesubCategorie'])     ->name('admin.deletesubcategories');
        Route::get('/activeSubCat/{id?}', [subCagegories::class, 'activesubCategorie'])     ->name('admin.activesubcategories');

    });

});

});





// Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>['auth','admin']], function()
// {
//     Route::get('/', function () {
//         return view('welcome');
//     });
//     Route::get('/login','AdminLogin@index');
// });


Route::get('/erorr404', [erorrController::class, 'erorr404'])->name('admin.erorr');

