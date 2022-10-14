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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/app',[\App\Http\Controllers\app::class,'start_app'])->name('app');
Route::get('/podsumowanie',function(){
    return view('app_central',[
        'siteNameTittle'=> 'Podsumowanie',
    ]);
})->name('app_central');
Route::get('/projekty',function(){
    return view('app_projects',[
        'siteNameTittle'=> 'projekty',
    ]);
})->name('app_projects');
Route::get('/leady',function(){
    return view('app_leads',[
        'siteNameTittle'=> 'Leady',
    ]);
})->name('app_leads');
Route::get('/kontakty',function(){
    return view('app_contacts',[
        'siteNameTittle'=> 'Kontakty',
    ]);
})->name('app_contacts');
require __DIR__.'/auth.php';
