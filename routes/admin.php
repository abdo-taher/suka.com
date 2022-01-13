<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Dashbord\AdminLoginController;
use App\Http\Controllers\Dashbord\DashbordConrtroller;
use App\Http\Controllers\Dashbord\LanguagesController;
use App\Http\Controllers\Dashbord\MainCategories;
use App\Http\Controllers\Dashbord\subCagegories;
use App\Http\Controllers\Dashbord\vendorsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\LaravelLocalization;


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

define('PAGENATION_COUNT',10);
define('AppLocale',appLocale());

Auth::routes();


        //login route

Route::get('/migrator',function (){

});
Route::get('/login', [AdminLoginController::class, 'loginPage'])->name('admin.login');
Route::post('checkLogin', [AdminLoginController::class, 'checkLogin'])->name('admin.checkLogin');

//        login done
Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/', [DashbordConrtroller::class, 'index'])->name('Dashbord');


//    Route::group(
//        [
//            'prefix' => LaravelLocalization::setLocale(),
//            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//        ], function(){


        // languages routes

    Route::group(['prefix' => 'languages'],function(){
        Route::get('/', [LanguagesController::class, 'view'])                       ->name('admin.languages');
        Route::get('/&{action?}', [vendorsController::class, 'select'])                       ->name('admin.selectLanguages');
        Route::get('/crate', [LanguagesController::class, 'addForm'])                 ->name('admin.addLanguages');
        Route::post('/store', [LanguagesController::class, 'addCheck'])  ->name('admin.addlanguagescheck');
        Route::get('/edit/{id?}', [LanguagesController::class, 'editForm'])               ->name('admin.editLanguages');
        Route::post('/update/{id?}', [LanguagesController::class, 'editCheck'])->name('admin.editlanguagescheck');
        Route::get('/deletelanguage/{id?}', [LanguagesController::class, 'deletelanguage'])->name('admin.deletelanguages');
        Route::get('/activelanguage/{id?}', [LanguagesController::class, 'activelanguage'])->name('admin.activelanguages');

    });
    Route::group(['prefix' => 'main-categories'],function(){

        Route::get('/', [MainCategories::class, 'view'])                            ->name('admin.viewcategories');
        Route::get('/&{action?}', [MainCategories::class, 'select'])                       ->name('admin.selectcategories');
        Route::get('/add', [MainCategories::class, 'addForm'])                      ->name('admin.addcategories');
        Route::post('/addlanguagescheck', [MainCategories::class, 'addCheck'])       ->name('admin.addcategoriescheck');
        Route::get('edit/{id?}', [MainCategories::class, 'editForm'])                    ->name('admin.editcategories');
        Route::post('/editCategorieCheck/{id?}', [MainCategories::class, 'editCheck'])     ->name('admin.editcategoriescheck');
        Route::get('/deleteMainCat/{id?}', [MainCategories::class, 'deleteCategorie'])     ->name('admin.deletecategories');
        Route::get('/activeMainCat/{id?}', [MainCategories::class, 'activeCategorie'])     ->name('admin.activecategories');

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

//});







// Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>['auth','admin']], function()
// {
//     Route::get('/', function () {
//         return view('welcome');
//     });
//     Route::get('/login','AdminLogin@index');
// });


Route::get('/erorr404', [erorrController::class, 'erorr404'])->name('admin.erorr');

