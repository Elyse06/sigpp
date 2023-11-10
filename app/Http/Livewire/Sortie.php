<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\SoldeSortie;
use App\Models\SortiePersonnel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

    public $search = "";

    public function render()
    {

        $searchCriteria = "%".$this->search."%";

        return view('livewire.sortie.index', [
            "sorties" => SortiePersonnel::whereHas('emploie', function ($query) use ($searchCriteria){
                $query->where('nom', 'like', '%' . $searchCriteria . '%');

            })->latest()->paginate(5)
        ], [
            "employees" => Employee::all()
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

        // remplir le solde restant
        public function remplirSoldeRestant()
        {
            // Récupérez le "Solde du mois" et le "Total Prix" depuis le modèle.
            $soldeDuMois = $this->newSortie['sldtotsortie'];
            $totalPrix = $this->newSortie['sldeffsortie'];
    
            // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
            $soldeRestant = $soldeDuMois - $totalPrix;
    
            // Mettez à jour le champ "Solde restant".
            $this->newSortie['sldrstsortie'] = $soldeRestant;
        }
    
        public function remplirSoldeRestantEdit()
        {
            // Récupérez le "Solde du mois" et le "Total Prix" depuis le modèle.
            $soldeDuMois = $this->editSortie['sldtotsortie'];
            $totalPrix = $this->editSortie['sldeffsortie'];
    
            // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
            $soldeRestant = $soldeDuMois - $totalPrix;
    
            // Mettez à jour le champ "Solde restant".
            $this->editSortie['sldrstsortie'] = $soldeRestant;
        }
    
        // recuperer le solde du moi en fonction du employee
        public function getSoldeByEmployeeId()
        {
            $employeeId = $this->newSortie['employee_id'];
    
            $solde = Employee::where('id', $employeeId)->value('soldesortie');
    
            $this->newSortie['sldtotsortie'] = $solde;
        }
    
        public function getSoldeByEmployeeIdEdit()
        { 
            $employeeId = $this->editSortie['employee_id'];
    
            $solde = Employee::where('id', $employeeId)->value('soldesortie');
    
            $this->editSortie['sldtotsortie'] = $solde;
        }

        // recuperer le total prix by date
        public function remplirTotalPrix()
        {
            $dateDebut = $this->newSortie['debutsortie'];
            $dateFin = $this->newSortie['finsortie'];
            $totalPrix = Carbon::parse($dateDebut)->diff(Carbon::parse($dateFin))->d;
            $this->newSortie['sldeffsortie'] = $totalPrix;
        }
        public function remplirTotalPrixEdit()
        {
            $dateDebut = $this->editSortie['debutsortie'];
            $dateFin = $this->editSortie['finsortie'];
            $totalPrix = Carbon::parse($dateDebut)->diff(Carbon::parse($dateFin))->d;
            $this->editSortie['sldeffsortie'] = $totalPrix;
        }


    // pour faire l'ajout
    public function addSortie(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $sortiData = $validationAttribute["newSortie"];
        
        // ajout d'un nouvelle mission
        SortiePersonnel::create($sortiData);

        // reinitialiser newMission 
        $this->newSortie = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Sortie creer avec succès!"]);
    }

    // pour faire la modification
    public function updateSortie(){
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $sortiData = $validationAttribute["editSortie"];

        // modification
        SortiePersonnel::find($this->editSortie["id"])->update($sortiData);

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

