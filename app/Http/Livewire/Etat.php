<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Livewire\Component;

class Etat extends Component
{
    public function render()
    {
        $mission = Mission::where('finmis', '>=', now()->toDateString())->where('debutmis', '<=', now()->toDateString())->get();
    	$conge = Conge::where('fincon', '>=', now()->toDateString())->where('debutcon', '<=', now()->toDateString())->get();
    	$permission = Permission::where('finpermi', '>=', now()->toDateString())->where('debutpermi', '<=', now()->toDateString())->get();
    	$sortie = SortiePersonnel::where('finsortie', '>=', now()->toDateString())->where('debutsortie', '<=', now()->toDateString())->get();
    	$repos = RepoMedical::where('finrep', '>=', now()->toDateString())->where('debutrep', '<=', now()->toDateString())->get();
        $total = Employee::get();
    	$mission_count = count($mission);    	
    	$conge_count = count($conge);
    	$permission_count = count($permission);
    	$sortie_count = count($sortie);
    	$repos_count = count($repos);
    	$total_count = count($total);
        return view('livewire.etat.index',compact('mission_count','conge_count','permission_count','sortie_count','repos_count','total_count'))
        ->extends("layouts.master")
        ->section("contenu");
    }
}
