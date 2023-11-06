<?php

use App\Http\Controllers\EchartController;
use App\Http\Livewire\Calendar;
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
use Illuminate\Support\Facades\Response;

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
Route::get('/Solde des employées/sup', [App\Http\Controllers\NotificationController::class, 'index'])->name('solde');
Route::get('/Solde des employées', [Solde::class, 'render'])->name('solde');

Route::group(
    [
        "prefix" => "emploie",
        "as" => "emploie."
    ],
    function () {
        Route::get('/calendar', Calendar::class)->name('calendar');
    }
);

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


Route::get('/pdf', [Solde::class, 'generatePDF'])->name('rapport.generatePDF');

Route::get('/Solde des employées/downloadPDF/{filename}', [Solde::class, 'downloadPDF'])
    ->name('rapport.downloadPDF');

    Route::get('/download-pdf/{filename}', function ($filename) {
        $localPath = 'C:\laragon\www\Moo4\pdf'; // Remplacez par le chemin complet vers votre répertoire local
    
        $file = $localPath . DIRECTORY_SEPARATOR . $filename;
    
        return Response::download($file);
    })->name('download-pdf');

