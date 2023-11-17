<?php

use App\Http\Controllers\EchartController;
use App\Http\Controllers\TopCongeController;
use App\Http\Controllers\TopMissionController;
use App\Http\Controllers\TopPermissionController;
use App\Http\Controllers\TopReposController;
use App\Http\Controllers\TopSortieController;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Conge as LivewireConge;
use App\Http\Livewire\CongeCeAnne;
use App\Http\Livewire\CongeCeMoi;
use App\Http\Livewire\Etat;
use App\Http\Livewire\Liste;
use App\Http\Livewire\Mission;
use App\Http\Livewire\MissionCeAnne;
use App\Http\Livewire\MissionCeMoi;
use App\Http\Livewire\Permission as LivewirePermission;
use App\Http\Livewire\PermissionCeAnne;
use App\Http\Livewire\PermissionCeMoi;
use App\Http\Livewire\Repos;
use App\Http\Livewire\ReposCeAnne;
use App\Http\Livewire\ReposCeMoi;
use App\Http\Livewire\Solde;
use App\Http\Livewire\Sortie;
use App\Http\Livewire\SortieCeAnne;
use App\Http\Livewire\SortieCeMoi;
use App\Http\Livewire\TouteLesConge;
use App\Http\Livewire\TouteLesMission;
use App\Http\Livewire\TouteLesPermission;
use App\Http\Livewire\TouteLesRepos;
use App\Http\Livewire\TouteLesSortie;
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
Route::get('/Top Conge', [App\Http\Controllers\TopCongeController::class, 'index'])->name('top.conge');
Route::get('/Top Mission', [App\Http\Controllers\TopMissionController::class, 'index'])->name('top.mission');
Route::get('/Top Permission', [App\Http\Controllers\TopPermissionController::class, 'index'])->name('top.permission');
Route::get('/Top Sortie', [App\Http\Controllers\TopSortieController::class, 'index'])->name('top.sortie');
Route::get('/Top Repos', [App\Http\Controllers\TopReposController::class, 'index'])->name('top.repos');

Route::group(
    [
        "prefix" => "employee",
        "as" => "employee."
    ],
    function () {
        Route::get('/Liste', Liste::class)->name('liste');
        Route::get('/Solde', Solde::class)->name('solde');
    }
);

Route::group(
    [
        "prefix" => "planning",
        "as" => "planning."
    ],
    function () {
        Route::get('/mission', Mission::class)->name('mission');
        Route::get('/mission/moi', MissionCeMoi::class)->name('mission.moi');
        Route::get('/mission/anne', MissionCeAnne::class)->name('mission.anne');
        Route::get('/mission/tout', TouteLesMission::class)->name('mission.tout');

        Route::get('/conge', LivewireConge::class)->name('conge');
        Route::get('/conge/moi', CongeCeMoi::class)->name('conge.moi');
        Route::get('/conge/anne', CongeCeAnne::class)->name('conge.anne');
        Route::get('/conge/tout', TouteLesConge::class)->name('conge.tout');

        Route::get('/permission', LivewirePermission::class)->name('permission');
        Route::get('/permission/moi', PermissionCeMoi::class)->name('permission.moi');
        Route::get('/permission/anne', PermissionCeAnne::class)->name('permission.anne');
        Route::get('/permission/tout', TouteLesPermission::class)->name('permission.tout');

        Route::get('/sortiperso', Sortie::class)->name('sortie');
        Route::get('/sortiperso/moi', SortieCeMoi::class)->name('sortie.moi');
        Route::get('/sortiperso/anne', SortieCeAnne::class)->name('sortie.anne');
        Route::get('/sortiperso/tout', TouteLesSortie::class)->name('sortie.tout');

        Route::get('/repomedical', Repos::class)->name('repos');
        Route::get('/repomedical/moi', ReposCeMoi::class)->name('repos.moi');
        Route::get('/repomedical/anne', ReposCeAnne::class)->name('repos.anne');
        Route::get('/repomedical/tout', TouteLesRepos::class)->name('repos.tout');

        Route::get('/etat', Etat::class)->name('etat');
    }
);

// pdf pour le solde
Route::get('/pdf', [Solde::class, 'generatePDF'])->name('rapport.generatePDF');

Route::get('/Solde des employées/downloadPDF/{filename}', [Solde::class, 'downloadPDF'])
    ->name('rapport.downloadPDF');

    Route::get('/download-pdf/{filename}', function ($filename) {
        $localPath = 'C:\laragon\www\Moo4\pdf'; // Remplacez par le chemin complet vers votre répertoire local
    
        $file = $localPath . DIRECTORY_SEPARATOR . $filename;
    
        return Response::download($file);
    })->name('download-pdf');


// pdf pour le top 10 des conges
Route::get('/pdftopconge', [TopCongeController::class, 'generatePDF'])->name('topconge.generatePDF');

Route::get('/Top Conge/downloadPDF/{filename}', [TopCongeController::class, 'downloadPDF'])
    ->name('topconge.downloadPDF');

    Route::get('/download-pdf/{filename}', function ($filename) {
        $localPath = 'C:\laragon\www\Moo4\pdf';
    
        $file = $localPath . DIRECTORY_SEPARATOR . $filename;
    
        return Response::download($file);
    })->name('download-pdf');


// pdf pour le top 10 des Mission
Route::get('/pdftopmission', [TopMissionController::class, 'generatePDF'])->name('topmission.generatePDF');

Route::get('/Top Mission/downloadPDF/{filename}', [TopMissionController::class, 'downloadPDF'])
    ->name('topmission.downloadPDF');

    Route::get('/download-pdf/{filename}', function ($filename) {
        $localPath = 'C:\laragon\www\Moo4\pdf';
    
        $file = $localPath . DIRECTORY_SEPARATOR . $filename;
    
        return Response::download($file);
    })->name('download-pdf');

    
// pdf pour le top 10 des Permission
Route::get('/pdftoppermission', [TopPermissionController::class, 'generatePDF'])->name('toppermission.generatePDF');

Route::get('/Top Permission/downloadPDF/{filename}', [TopPermissionController::class, 'downloadPDF'])
    ->name('toppermission.downloadPDF');

    Route::get('/download-pdf/{filename}', function ($filename) {
        $localPath = 'C:\laragon\www\Moo4\pdf';
    
        $file = $localPath . DIRECTORY_SEPARATOR . $filename;
    
        return Response::download($file);
    })->name('download-pdf');

    
// pdf pour le top 10 des repos
Route::get('/pdftoprepos', [TopReposController::class, 'generatePDF'])->name('toprepos.generatePDF');

Route::get('/Top Repos/downloadPDF/{filename}', [TopReposController::class, 'downloadPDF'])
    ->name('toprepos.downloadPDF');

    Route::get('/download-pdf/{filename}', function ($filename) {
        $localPath = 'C:\laragon\www\Moo4\pdf';
    
        $file = $localPath . DIRECTORY_SEPARATOR . $filename;
    
        return Response::download($file);
    })->name('download-pdf');

    
    // pdf pour le top 10 des sortie
    Route::get('/pdftopsortie', [TopSortieController::class, 'generatePDF'])->name('topsortie.generatePDF');
    
    Route::get('/Top Sortie/downloadPDF/{filename}', [TopSortieController::class, 'downloadPDF'])
        ->name('topsortie.downloadPDF');
    
        Route::get('/download-pdf/{filename}', function ($filename) {
            $localPath = 'C:\laragon\www\Moo4\pdf';
        
            $file = $localPath . DIRECTORY_SEPARATOR . $filename;
        
            return Response::download($file);
        })->name('download-pdf');
    