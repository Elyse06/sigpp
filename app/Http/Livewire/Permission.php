<?php

namespace App\Http\Livewire;

use App\Models\Permission as ModelsPermission;
use Livewire\Component;
use Livewire\WithPagination;

class Permission extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    // pour les changement du page
    public $currentPage = PAGELIST;

    public $newPermission= [];
    public $editPermission = [];

public function render()
    {
        return view('livewire.permission.index', [
            "permissions" => ModelsPermission::latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }


    // plusiere roles
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editPermission.employee_id' => 'required',
                'editPermission.sldtotpermi' => 'required',
                'editPermission.sldeffpermi' => 'required',
                'editPermission.sldrstpermi' => 'required',
                'editPermission.debutpermi' => 'required',
                'editPermission.finpermi' => 'required',
                'editPermission.motifpermi' => 'required'
            ];
        }

        return [
            'newPermission.employee_id' => 'required',
            'newPermission.sldtotpermi' => 'required',
            'newPermission.sldeffpermi' => 'required',
            'newPermission.sldrstpermi' => 'required',
            'newPermission.debutpermi' => 'required',
            'newPermission.finpermi' => 'required',
            'newPermission.motifpermi' => 'required'
        ];
    }

    // mandeha @formulaire ajouter
    public function goAjouterPermission(){
        $this->currentPage = PAGECREATFORM;
    }

    // mandeha @formulaire editer
    public function goEditPermission($id){
        // recuperer tous les valeur du table pour le mettre dans le form a editer
        $this->editPermission = ModelsPermission::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    // mimpoly @liste eo
    public function retourListPermission(){
        $this->currentPage = PAGELIST;
        $this->editPermission = [];
    }

    // pour faire l'ajout
    public function addPermission(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        
        // ajout d'un nouvelle mission
        ModelsPermission::create($validationAttribute["newPermission"]);

        // reinitialiser newMission 
        $this->newPermission = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Permission creer avec succès!"]);
    }

    // pour faire la modification
    public function updatePermission(){
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();

        // modification
        ModelsPermission::find($this->editPermission["id"])->update($validationAttribute["editPermission"]);

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Permission modifier avec succès!"]);
    }

    // pour la confirmation du supression
    public function confirmDelete($id){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>[
            "text" => "Vous etes sur le point de supprimer cette composant de la liste du mission. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                    "permi_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deletePermission($id){
        ModelsPermission::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Permission supprimer avec succès!"]);
    }

}