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

		$mission = Mission::where(function($query) use ($dateDebut, $dateFin) {
				$query->whereBetween('debutmis', [$dateDebut, $dateFin])
					  ->orWhere(function($query) use ($dateDebut, $dateFin) {
						  $query->where('debutmis', '=<', $dateDebut)
								->where('finmis', '>=', $dateDebut);
					  });
		})
		->get();
	
		$conge = Conge::where(function($query) use ($dateDebut, $dateFin) {
				$query->whereBetween('debutcon', [$dateDebut, $dateFin])
					  ->orWhere(function($query) use ($dateDebut, $dateFin) {
						  $query->where('debutcon', '=<', $dateDebut)
								->where('fincon', '>=', $dateDebut);
					  });
		})
		->get();
	
		$permission = Permission::where(function($query) use ($dateDebut, $dateFin) {
				$query->whereBetween('debutpermi', [$dateDebut, $dateFin])
					  ->orWhere(function($query) use ($dateDebut, $dateFin) {
						  $query->where('debutpermi', '=<', $dateDebut)
								->where('finpermi', '>=', $dateDebut);
					  });
		})
		->get();
	
		$sortie = SortiePersonnel::where(function($query) use ($dateDebut, $dateFin) {
				$query->whereBetween('debutsortie', [$dateDebut, $dateFin])
					  ->orWhere(function($query) use ($dateDebut, $dateFin) {
						  $query->where('debutsortie', '=<', $dateDebut)
								->where('finsortie', '>=', $dateDebut);
					  });
		})
		->get();
	
		$repos = RepoMedical::where(function($query) use ($dateDebut, $dateFin) {
				$query->whereBetween('debutrep', [$dateDebut, $dateFin])
					  ->orWhere(function($query) use ($dateDebut, $dateFin) {
						  $query->where('debutrep', '=<', $dateDebut)
								->where('finrep', '>=', $dateDebut);
					  });
		})
		->get();

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
