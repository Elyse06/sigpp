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

        // recuperer le solde du moi en fonction du employee et remplir automatiquement les solde
        public function getSoldeByEmployeeId()
        {
            $employeeId = $this->newSortie['employee_id'];
            $dateDebut = Carbon::parse($this->newSortie['debutsortie']);
            $moisDebut = $dateDebut->month;
        
            // Utilisation de la clause where pour filtrer par année et mois de début
            $SortieDuMois = SortiePersonnel::whereYear("debutsortie", $dateDebut->year)
                ->whereMonth("debutsortie", $moisDebut)
                ->where("employee_id", $employeeId)
                ->get();
        
            $solde = 0; // Initialisation du solde à 0
        
            if ($SortieDuMois->isNotEmpty()) {
                foreach ($SortieDuMois as $SortieDuMoi) {
                    $debut = Carbon::parse($SortieDuMoi->debutsortie);
                    $fin = Carbon::parse($SortieDuMoi->finsortie);
        
                    // Calcul de la différence entre l'heure de début et de fin en heure
                    $differenceEnJours = $debut->diffInHours($fin);
        
                    // Ajoute la différence au solde
                    $solde += $differenceEnJours;
                }
        
                // Ajuste le solde si nécessaire
                if ($solde > 8) {
                    $solde = 0;
                } else {
                    $solde = 8 - $solde;
                }
            } else {
                // Si aucun congé trouvé, le solde reste à 2
                $solde = 8;
            }
        
            // Mettez à jour le champ solde dans le formulaire
            $this->newSortie['sldtotsortie'] = $solde;
    
            // remplir total prix
            $dateDebute = $this->newSortie['debutsortie'];
            $dateFin = $this->newSortie['finsortie'];
            $totalPrix = Carbon::parse($dateDebute)->diff(Carbon::parse($dateFin))->h;
            $this->newSortie['sldeffsortie'] = $totalPrix;
    
            // remplir solde restant
            // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
            $soldeRestant = $solde - $totalPrix;
    
            // Mettez à jour le champ "Solde restant".
            $this->newSortie['sldrstsortie'] = $soldeRestant;
            
        }
    
        // recuperer le solde du moi en fonction du employee et remplir automatiquement les solde
        public function getSoldeByEmployeeIdEdit()
        {
            $employeeId = $this->editSortie['employee_id'];
            $dateDebut = Carbon::parse($this->editSortie['debutsortie']);
            $moisDebut = $dateDebut->month;
            $jourDebut = $dateDebut->day;
        
            // Utilisation de la clause where pour filtrer par année et mois de début
            $SortieDuMois = SortiePersonnel::whereYear("debutsortie", $dateDebut->year)
                ->whereMonth("debutsortie", $moisDebut)
                ->whereDay("debutsortie", !$jourDebut)
                ->where("employee_id", $employeeId)
                ->get();
        
            $solde = 0; // Initialisation du solde à 0
        
            if ($SortieDuMois->isNotEmpty()) {
                foreach ($SortieDuMois as $SortieDuMoi) {
                    $debut = Carbon::parse($SortieDuMoi->debutsortie);
                    $fin = Carbon::parse($SortieDuMoi->finsortie);
        
                    // Calcul de la différence entre l'heure de début et de fin en heure
                    $differenceEnJours = $debut->diffInHours($fin);
        
                    // Ajoute la différence au solde
                    $solde += $differenceEnJours;
                }
        
                // Ajuste le solde si nécessaire
                if ($solde > 8) {
                    $solde = 0;
                } else {
                    $solde = 8 - $solde;
                }
            } else {
                // Si aucun congé trouvé, le solde reste à 2
                $solde = 8;
            }
        
            // Mettez à jour le champ solde dans le formulaire
            $this->editSortie['sldtotsortie'] = $solde;
    
            // remplir total prix
            $dateDebute = $this->editSortie['debutsortie'];
            $dateFin = $this->editSortie['finsortie'];
            $totalPrix = Carbon::parse($dateDebute)->diff(Carbon::parse($dateFin))->h;
            $this->editSortie['sldeffsortie'] = $totalPrix;
    
            // remplir solde restant
            // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
            $soldeRestant = $solde - $totalPrix;
    
            // Mettez à jour le champ "Solde restant".
            $this->newSortie['sldrstsortie'] = $soldeRestant;
            
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

