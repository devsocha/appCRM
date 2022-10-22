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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/app',[\App\Http\Controllers\app::class,'start_app'])->name('app');

Route::get('/app/{id}',[\App\Http\Controllers\companyShowController::class , 'companyShow'])->middleware(['auth', 'verified'])->name('companyShow');


Route::get('/app',[\App\Http\Controllers\app::class,'start_app'])->middleware(['auth', 'verified'])->name('app');

Route::get('/podsumowanie',function(){
    return view('app_central',[
        'siteNameTittle'=> 'Podsumowanie',
    ]);
})->middleware(['auth', 'verified'])->name('app_central');
Route::get('/projekty',function(){
    return view('app_projects',[
        'siteNameTittle'=> 'projekty',
    ]);
})->middleware(['auth', 'verified'])->name('app_projects');
Route::get('/leady/{nr?}',[\App\Http\Controllers\LeadController::class,'lead'])->middleware(['auth', 'verified'])->name('app_leads');
Route::get('/kontakty',function(){
    return view('app_contacts',[
        'siteNameTittle'=> 'Kontakty',
    ]);
})->middleware(['auth', 'verified'])->name('app_contacts');
Route::get('/logout',[\App\Http\Controllers\logout_app::class ,'logout'])->name('logout_app');
Route::get('/addCompany',function (){
    return view('app_add_lead',[
        'siteNameTittle'=>'Dodawanie leada',
    ]);
})->middleware(['auth', 'verified'])->name('app_add_lead');
Route::post('/addCompany/add',[\App\Http\Controllers\LeadController::class,'addLead'])->middleware(['auth', 'verified'])->name('addCompany');
require __DIR__.'/auth.php';
