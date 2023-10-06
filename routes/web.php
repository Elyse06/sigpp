<?php

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
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

Route::get('/bhb', function () {
    return view('welcome');
});

Route::get('/employees', function () {
    return Employee::with('conges', 'permissions')->paginate(5);
});

Route::get('/conges', function () {
    return Conge::with('emploie')->paginate(5);
});

Route::get('/permissions', function () {
    return Permission::with('emploie')->paginate(5);
});

Route::get('/repomedicals', function () {
    return RepoMedical::with('emploie')->paginate(5);
});

Route::get('/sortieperso', function () {
    return SortiePersonnel::with('emploie')->paginate(5);
});
