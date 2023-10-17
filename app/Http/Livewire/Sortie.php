<?php

namespace App\Http\Livewire;

use App\Models\SortiePersonnel;
use Livewire\Component;
use Livewire\WithPagination;

class Sortie extends Component
{
    
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    // pour les changement du page
    public $currentPage = PAGELIST;

    public $newSortie = [];
    public $editSortie = [];


    public function render()
    {
        return view('livewire.sortie.index', [
            "sorties" => SortiePersonnel::latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    // plusiere roles
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editSortie.employee_id' => 'required',
                'editSortie.sldtotsortie' => 'required',
                'editSortie.sldeffsortie' => 'required',
                'editSortie.sldrstsortie' => 'required',
                'editSortie.debutsortie' => 'required',
                'editSortie.finsortie' => 'required',
                'editSortie.motifsortie' => 'required'
            ];
        }

        return [
            'newSortie.employee_id' => 'required',
            'newSortie.sldtotsortie' => 'required',
            'newSortie.sldeffsortie' => 'required',
            'newSortie.sldrstsortie' => 'required',
            'newSortie.debutsortie' => 'required',
            'newSortie.finsortie' => 'required',
            'newSortie.motifsortie' => 'required'
        ];
    }

    // mandeha @formulaire ajouter
    public function goAjouterSortie(){
        $this->currentPage = PAGECREATFORM;
    }

    // mandeha @formulaire editer
    public function goEditSortie($id){
        // recuperer tous les valeur du table pour le mettre dans le form a editer
        $this->editSortie = SortiePersonnel::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    // mimpoly @liste eo
    public function retourListSortie(){
        $this->currentPage = PAGELIST;
        $this->editSortie = [];
    }

    // pour faire l'ajout
    public function addSortie(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        
        // ajout d'un nouvelle mission
        SortiePersonnel::create($validationAttribute["newSortie"]);

        // reinitialiser newMission 
        $this->newSortie = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Sortie creer avec succès!"]);
    }

    // pour faire la modification
    public function updateSortie(){
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();

        // modification
        SortiePersonnel::find($this->editSortie["id"])->update($validationAttribute["editSortie"]);

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Sortie modifier avec succès!"]);
    }

    // pour la confirmation du supression
    public function confirmDelete($id){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>[
            "text" => "Vous etes sur le point de supprimer cette composant de la liste du mission. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                    "sortie_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deleteSortie($id){
        SortiePersonnel::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Sortie supprimer avec succès!"]);
    }

}

