<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Mission as ModelsMission;
use Livewire\Component;
use Livewire\WithPagination;

class Mission extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $btnAjouClick = false;

    public $newMission = [];

    protected $rules = [
        'newMission.debutmis' => 'required',
        'newMission.finmis' => 'required',
        'newMission.lieumis' => 'required',
        'newMission.motifmis' => 'required',
        'newMission.vehicule_id' => 'required'
    ];

    public function render()
    {
        return view('livewire.mission.index', [
            "missions" => ModelsMission::latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goAjouterMission(){
        $this->btnAjouClick = true;
    }

    public function retourListMis(){
        $this->btnAjouClick = false;
    }


    // pour faire l'ajout
    public function addMission(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        
        // ajout d'un nouvelle mission
        ModelsMission::create($validationAttribute["newMission"]);

        // reinitialiser newMission 
        $this->newMission = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("missionCreerSucces", ["message"=>"Mission creer avec succès!"]);
    }

    // pour la confirmation du supression
    public function confirmDelete($lieu){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>"Vous etes sur le point de supprimer $lieu de la liste du mission. Voulez-vous continuer?"]);
    }

}
