<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Illuminate\Http\Request;
use Livewire\Component;

class Etat extends Component
{
    public $dateDebut;
    public $dateFin;

	public function mount(Request $request)
	{
		$this->dateDebut = $request->input('dateDebut', now()->toDateString());
		$this->dateFin = $request->input('dateFin', now()->toDateString());
	}

    public function render(Request $request)
    {
		$dateDebut = $request->input('dateDebut', $this->dateDebut);
    	$dateFin = $request->input('dateFin', $this->dateFin);

        $mission = Mission::where('finmis', '<=', $dateFin)->where('debutmis', '>=', $dateDebut)->get();
    	$conge = Conge::where('fincon', '<=', $dateFin)->where('debutcon', '>=', $dateDebut)->get();
    	$permission = Permission::where('finpermi', '<=', $dateFin)->where('debutpermi', '>=', $dateDebut)->get();
    	$sortie = SortiePersonnel::where('finsortie', '<=', $dateFin)->where('debutsortie', '>=', $dateDebut)->get();
    	$repos = RepoMedical::where('finrep', '<=', $dateFin)->where('debutrep', '>=', $dateDebut)->get();
        $total = Employee::get();
    	$mission_count = count($mission);    	
    	$conge_count = count($conge);
    	$permission_count = count($permission);
    	$sortie_count = count($sortie);
    	$repos_count = count($repos);
    	$total_count = count($total);
        return view('livewire.etat.index',compact('mission_count','conge_count','permission_count','sortie_count','repos_count','total_count','dateDebut','dateFin'))
        ->extends("layouts.master")
        ->section("contenu");
    }
}
