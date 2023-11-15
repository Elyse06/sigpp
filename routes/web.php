<?php

use App\Http\Controllers\EchartController;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Conge as LivewireConge;
use App\Http\Livewire\CongeCeAnne;
use App\Http\Livewire\CongeCeMoi;
use App\Http\Livewire\Etat;
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


Route::get('/pdf', [Solde::class, 'generatePDF'])->name('rapport.generatePDF');

Route::get('/Solde des employées/downloadPDF/{filename}', [Solde::class, 'downloadPDF'])
    ->name('rapport.downloadPDF');

    Route::get('/download-pdf/{filename}', function ($filename) {
        $localPath = 'C:\laragon\www\Moo4\pdf'; // Remplacez par le chemin complet vers votre répertoire local
    
        $file = $localPath . DIRECTORY_SEPARATOR . $filename;
    
        return Response::download($file);
    })->name('download-pdf');

