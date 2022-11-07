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
Route::get('/projekty',[\App\Http\Controllers\ProjectController::class,'showProjectAll'])->middleware(['auth', 'verified'])->name('app_projects');
Route::get('/leady/{nr?}',[\App\Http\Controllers\LeadController::class,'lead'])->middleware(['auth', 'verified'])->name('app_leads');
Route::get('/kontakty',[\App\Http\Controllers\ContactController::class,'showContactsAll'])->middleware(['auth', 'verified'])->name('showContactsAll');
Route::get('/logout',[\App\Http\Controllers\logout_app::class ,'logout'])->middleware(['auth', 'verified'])->name('logout_app');
Route::get('/addCompany',function (){
    return view('app_add_lead',[
        'siteNameTittle'=>'Dodawanie leada',
    ]);
})->middleware(['auth', 'verified'])->name('app_add_lead');
Route::post('/searchCompany',[\App\Http\Controllers\LeadController::class,'searchCompany'])->middleware(['auth', 'verified'])->name('searchCompany');
Route::post('/addCompany/add',[\App\Http\Controllers\LeadController::class,'addLead'])->middleware(['auth', 'verified'])->name('addCompany');
Route::get('/removeCompany/{id}',[\App\Http\Controllers\LeadController::class,'deleteCompany'])->middleware(['auth', 'verified'])->name('removeCompany');
Route::get('/kontakt/{id_osoba}/{id_leada}',[\App\Http\Controllers\ContactController::class,'showContacts'])->middleware(['auth', 'verified'])->name('showContacts');
Route::get('addContact/{id}',[\App\Http\Controllers\ContactController::class,'addContact'])->middleware(['auth', 'verified'])->name('addContact');
Route::post('addContactDb/{id}',[\App\Http\Controllers\ContactController::class,'addContactDb'])->middleware(['auth', 'verified'])->name('addContactDb');
Route::get('editContact/{id}/{idLead}',[\App\Http\Controllers\ContactController::class,'editContact'])->middleware(['auth', 'verified'])->name('editContact');
Route::get('deleteContact/{id}',[\App\Http\Controllers\ContactController::class,'deleteContact'])->middleware(['auth', 'verified'])->name('deleteContact');
Route::post('editContactDb/{id}/{idLead}',[\App\Http\Controllers\ContactController::class,'editContactDb'])->middleware(['auth', 'verified'])->name('editContactDb');
Route::get('addProject/{id}',[\App\Http\Controllers\ProjectController::class,'addProject'])->middleware(['auth', 'verified'])->name('addProject');
Route::get('projekt/{idproject}/{idfirma}',[\App\Http\Controllers\ProjectController::class,'showProjectToScreen'])->middleware(['auth', 'verified'])->name('showProjectToScreen');
Route::POST('addProjectDb/{id}',[\App\Http\Controllers\ProjectController::class,'addProjectDb'])->middleware(['auth', 'verified'])->name('addProjectDb');
Route::get('deleteproject/{idproject}/{idfirma}',[\App\Http\Controllers\ProjectController::class,'deleteProject'])->middleware(['auth', 'verified'])->name('deleteProject');

require __DIR__.'/auth.php';
