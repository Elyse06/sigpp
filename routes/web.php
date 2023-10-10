<?php

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    "prefix" => "planning",
    "as" => "planning."
], 
    function(){
        Route::get('/mission', [App\Http\Controllers\MissionController::class, 'index'])->name('mission');
        Route::get('/conge', [App\Http\Controllers\CongeController::class, 'index'])->name('conge');
        Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission');
        Route::get('/sortiperso', [App\Http\Controllers\SortieController::class, 'index'])->name('sortie');
        Route::get('/repomedical', [App\Http\Controllers\ReposController::class, 'index'])->name('repos');

});
