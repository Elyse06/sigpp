<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mission = Mission::get();
    	$conge = Conge::get();
    	$permission = Permission::get();
    	$sortie = SortiePersonnel::get();
    	$repos = RepoMedical::get();
        $total = Employee::get();
    	$mission_count = count($mission);    	
    	$conge_count = count($conge);
    	$permission_count = count($permission);
    	$sortie_count = count($sortie);
    	$repos_count = count($repos);
    	$total_count = count($total);
    	return view('home',compact('mission_count','conge_count','permission_count','sortie_count','repos_count','total_count'));
    }
}
