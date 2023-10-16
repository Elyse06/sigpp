<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Illuminate\Http\Request;

class EchartController extends Controller
{
    public function echart(Request $request)
    {
    	$mission = Mission::get();
    	$conge = Conge::get();
    	$permission = Permission::get();
    	$sortie = SortiePersonnel::get();
    	$repos = RepoMedical::get();
    	$mission_count = count($mission);    	
    	$conge_count = count($conge);
    	$permission_count = count($permission);
    	$sortie_count = count($sortie);
    	$repos_count = count($repos);
    	return view('components.acceuil',compact('mission_count','conge_count','permission_count','sortie_count','repos_count'));
    }
}
