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

    // pour les changement du page
    public $currentPage = PAGELIST;

    public $newMission = [];
    public $editMission = [];

    public $search = "";

    public function render()
    {

        $searchCriteria = "%".$this->search."%";

        return view('livewire.mission.index', [
            "missions" => ModelsMission::whereHas('emploie', function ($query) use ($searchCriteria){
                $query->where('nom', 'like', '%' . $searchCriteria . '%');

            })->latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    
    // plusiere roles
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editMission.employee_id' => 'required',
                'editMission.debutmis' => 'required',
                'editMission.finmis' => 'required',
                'editMission.lieumis' => 'required',
                'editMission.motifmis' => 'required',
                'editMission.vehicule_id' => 'required'
            ];
        }

        return [
            'newMission.debutmis' => 'required',
            'newMission.finmis' => 'required',
            'newMission.lieumis' => 'required',
            'newMission.motifmis' => 'required',
            'newMission.vehicule_id' => 'required',
            'newMission.employee_id' => 'required'
        ];
    }

    // mandeha @formulaire ajouter
    public function goAjouterMission(){
        $this->currentPage = PAGECREATFORM;
    }

    // mandeha @formulaire editer
    public function goEditMission($id, $idem){
        $mission = ModelsMission::find($id);
        $table = $mission->toArray();
        
        // recuperer tous les valeur du table pour le mettre dans le form a editer 
        
        $this->editMission = $table + [
            'employee_id' => $idem
        ];
        // $this->editMission = $table;


        $this->currentPage = PAGEEDITFORM;
    }

    // mimpoly @liste eo
    public function retourListMis(){
        $this->currentPage = PAGELIST;
        $this->editMission = [];
    }


    // pour faire l'ajout
    public function addMission(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        // recuperation de l'attribut employee_id seulement
        $valide = $this->validate(['newMission.employee_id' => 'required']);
        
        // ajout d'un nouvelle mission
        $newAdd = ModelsMission::create($validationAttribute["newMission"]);

        $newAdd = $newAdd->id;

        // ajout du table mission employee
        ModelsMission::find($newAdd)->emploie()->attach($valide);

        // reinitialiser newMission 
        $this->newMission = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Mission creer avec succès!"]);
    }

    // pour faire la modification
    public function updateMission(){
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $valide = $this->validate(['editMission.employee_id' => 'required']);

        $id = $this->editMission["id"];

        //recuperer l'id du ligne a modifier
        $mission = ModelsMission::find($id);
        

        // $fn->edh_id = $valide['editMission']['empo'];
        // $mission->emploie->employee_id = $valide['editMission']['employee_id'];


        // modification pour le table mission
        $mission->update($validationAttribute["editMission"]);

        //modification du relation
        // $mission->emploie()->updateExistingPivot($id, [ 'employee_id' => $valide]);
        $mission->emploie()->sync([$id => ['employee_id' => $valide['editMission']['employee_id']]]);

        // creer un evenement pour dire que l'enregistrement est effectué
        // $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Mission modifier avec succès!"]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Mission modifiée avec succès!"]);
    }

    // pour la confirmation du supression
    public function confirmDelete($id){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>[
            "text" => "Vous etes sur le point de supprimer cette composant de la liste du mission. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                    "mission_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deleteMission($id){
        ModelsMission::find($id)->emploie()->detach();

        ModelsMission::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Mission supprimer avec succès!"]);
    }

}
