<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociadosController;
use App\Http\Controllers\ClinicaController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\Manager\RoleController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\Manager\ModuleController;
use App\Http\Controllers\Manager\ResourceController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

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
    return view('auth/login');
});



Route::middleware(['auth:sanctum'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum'])->get('/register', function () {
    return view('auth/register');
})->name('register');



Route::group(['middleware' => ['auth','access.list.control'],  'prefix' => 'laboratorio'], function(){
    // Route::view('/dashboard','dashboard')->name('dashboard');
    Route::any('/search',[LaboratorioController::class,'search'])->name('laboratorio.search');
    Route::get('/',[LaboratorioController::class,'index'])->name('laboratorio.index');
    Route::get('/create',[LaboratorioController::class,'create'])->name('laboratorio.create');
    Route::post('/',[LaboratorioController::class,'store'])->name('laboratorio.store');
    Route::get('/{id}',[LaboratorioController::class,'show'])->name('laboratorio.show');
    Route::get('/edit/{id}',[LaboratorioController::class,'edit'])->name('laboratorio.edit');
    Route::put('/{id}',[LaboratorioController::class,'update'])->name('laboratorio.update');
    Route::post('/employees/getEmployees/',[LaboratorioController::class,'getEmployees'])->name('employees.getEmployees');
    Route::get('/autocomplete-search-query', [LaboratorioController::class, 'query'])->name('autocomplete.search.query');


});

Route::group(['middleware' => ['auth','access.list.control'],  'prefix' => 'associados'], function(){
    Route::any('/search',[AssociadosController::class,'search'])->name('associados.search');
    Route::get('/',[AssociadosController::class,'index'])->name('associados.index');
    Route::get('/{inscricao}',[AssociadosController::class,'show'])->name('associados.show');

});

Route::group(['middleware' => ['auth','access.list.control'],  'prefix' => 'manager'], function(){
	Route::get('/', function(){
		return redirect()->route('users.index');
	});

	Route::get('roles', [RoleController::class,'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class,'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class,'store'])->name('roles.store');
    Route::get('/roles/edit/{id}', [RoleController::class,'edit'])->name('roles.edit');
    Route::delete('/roles/destroy/{id}', [RoleController::class,'destroy'])->name('roles.destroy');
	Route::get('roles/{role}/resources', [RoleController::class,'syncResources'])->name('roles.resources');
	Route::put('roles/{role}/resources', [RoleController::class,'updateSyncResources'])->name('roles.resources.update');
    Route::put('/role/{id}',[RoleController::class,'update'])->name('roles.update');
	Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class,'update'])->name('users.update');
	Route::get('/resources', [ResourceController::class,'index'])->name('resources.index');
    Route::get('/resources/create', [ResourceController::class,'create'])->name('resources.create');
    Route::post('/resources/store', [ResourceController::class,'store'])->name('resources.store');
    Route::get('/resources/edit/{id}', [ResourceController::class,'edit'])->name('resources.edit');
    Route::put('/resources/update/{id}', [ResourceController::class,'update'])->name('resources.update');
    Route::delete('/resources/destroy/{id}', [ResourceController::class,'destroy'])->name('resources.destroy');



    Route::get('/modules', [ModuleController::class,'index'])->name('modules.index');

    Route::get('/modules/create', [ModuleController::class,'create'])->name('modules.create');
    Route::post('/modules/store', [ModuleController::class,'store'])->name('modules.store');
    Route::get('/modules/edit/{id}', [ModuleController::class,'edit'])->name('modules.edit');
    Route::get('/modules/update/{id}', [ModuleController::class,'update'])->name('modules.update');
    Route::get('/modules/destroy/{id}', [ModuleController::class,'destroy'])->name('modules.destroy');

    Route::get('/modules/{module}/resources', [ModuleController::class,'syncResources'])->name('modules.resources');

    Route::put('/modules/{module}/resources', [ModuleController::class,'updateSyncResources'])->name('modules.resources.update');
});

Route::group(['middleware' => ['auth','access.list.control'],  'prefix' => 'clinica'], function(){
    Route::get('/',[ClinicaController::class,'index'])->name('clinica.index');
    Route::get('/{id}',[ClinicaController::class,'show'])->name('clinica.show');
    // Route::get('/{id}',[LaboratorioController::class,'show'])->name('laboratorio.show');
});
