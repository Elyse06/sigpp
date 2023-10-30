<?php

use App\Http\Controllers\EchartController;
use App\Http\Livewire\Conge as LivewireConge;
use App\Http\Livewire\Mission;
use App\Http\Livewire\Permission as LivewirePermission;
use App\Http\Livewire\Repos;
use App\Http\Livewire\Solde;
use App\Http\Livewire\Sortie;
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
Route::get('/Solde des employées', [Solde::class, 'render'])->name('solde');

Route::group(
    [
        "prefix" => "planning",
        "as" => "planning."
    ],
    function () {
        Route::get('/mission', Mission::class)->name('mission');
        Route::get('/conge', LivewireConge::class)->name('conge');
        Route::get('/permission', LivewirePermission::class)->name('permission');
        Route::get('/sortiperso', Sortie::class)->name('sortie');
        Route::get('/repomedical', Repos::class)->name('repos');
    }
);

