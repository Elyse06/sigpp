<?php

namespace App\Http\Livewire;

use App\Models\Conge as ModelsConge;
use App\Models\Employee;
use App\Models\SoldeConge;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Conge extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    // pour les changement du page
    public $currentPage = PAGELIST;

    public $newConge = [];
    public $editConge = [];

    public $search = "";


    public function render()
    {

        $searchCriteria = "%".$this->search."%";


        return view('livewire.conge.index', [
            "conges" => ModelsConge::whereHas('emploie', function ($query) use ($searchCriteria){
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
                'editConge.employee_id' => 'required',
                'editConge.sldtotcon' => 'required',
                'editConge.sldeffcon' => 'required',
                'editConge.sldrstcon' => 'required',
                'editConge.debutcon' => 'required',
                'editConge.fincon' => 'required',
                'editConge.motifcon' => 'required'
            ];
        }

        return [
            'newConge.employee_id' => 'required',
            'newConge.sldtotcon' => 'required',
            'newConge.sldeffcon' => 'required',
            'newConge.sldrstcon' => 'required',
            'newConge.debutcon' => 'required',
            'newConge.fincon' => 'required',
            'newConge.motifcon' => 'required'
        ];
    }

    // mandeha @formulaire ajouter
    public function goAjouterConge(){
        $this->currentPage = PAGECREATFORM;
    }

    // mandeha @formulaire editer
    public function goEditConge($id){
        // recuperer tous les valeur du table pour le mettre dans le form a editer
        $this->editConge = ModelsConge::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    // mimpoly @liste eo
    public function retourListCon(){
        $this->currentPage = PAGELIST;
        $this->editConge = [];
    }

    // recuperer le solde du moi en fonction du employee et remplir automatiquement les solde
    public function getSoldeByEmployeeId()
    {
        $employeeId = $this->newConge['employee_id'];
        $dateDebut = Carbon::parse($this->newConge['debutcon']);
        $moisDebut = $dateDebut->month;
    
        // Utilisation de la clause where pour filtrer par année et mois de début
        $congeDuMois = ModelsConge::whereYear("debutcon", $dateDebut->year)
            ->whereMonth("debutcon", $moisDebut)
            ->where("employee_id", $employeeId)
            ->get();
    
        $solde = 0; // Initialisation du solde à 0
    
        if ($congeDuMois->isNotEmpty()) {
            foreach ($congeDuMois as $congeDuMoi) {
                $debut = Carbon::parse($congeDuMoi->debutcon);
                $fin = Carbon::parse($congeDuMoi->fincon);
    
                // Calcul de la différence entre la date de début et de fin en jours
                $differenceEnJours = $debut->diffInDays($fin);
    
                // Ajoute la différence au solde
                $solde += $differenceEnJours;
            }
    
            // Ajuste le solde si nécessaire
            if ($solde > 2) {
                $solde = 0;
            } else {
                $solde = 2 - $solde;
            }
        } else {
            // Si aucun congé trouvé, le solde reste à 2
            $solde = 2;
        }
    
        // Mettez à jour le champ solde dans le formulaire
        $this->newConge['sldtotcon'] = $solde;

        // remplir total prix
        $dateDebute = $this->newConge['debutcon'];
        $dateFin = $this->newConge['fincon'];
        $totalPrix = Carbon::parse($dateDebute)->diff(Carbon::parse($dateFin))->d;
        $this->newConge['sldeffcon'] = $totalPrix;

        // remplir solde restant
        // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
        $soldeRestant = $solde - $totalPrix;

        // Mettez à jour le champ "Solde restant".
        $this->newConge['sldrstcon'] = $soldeRestant;
        
    }
    


    public function getSoldeByEmployeeIdEdit()
    {
        $employeeId = $this->editConge['employee_id'];
        $dateDebut = Carbon::parse($this->editConge['debutcon']);
        $moisDebut = $dateDebut->month;
        $jourDebut = $dateDebut->day;
    
        // Utilisation de la clause where pour filtrer par année et mois de début
        $congeDuMois = ModelsConge::whereYear("debutcon", $dateDebut->year)
            ->whereMonth("debutcon", $moisDebut)
            ->whereDay("debutcon", !$jourDebut)
            ->where("employee_id", $employeeId)
            ->get();
    
        $solde = 0; // Initialisation du solde à 0
    
        if ($congeDuMois->isNotEmpty()) {
            foreach ($congeDuMois as $congeDuMoi) {
                $debut = Carbon::parse($congeDuMoi->debutcon);
                $fin = Carbon::parse($congeDuMoi->fincon);
    
                // Calcul de la différence entre la date de début et de fin en jours
                $differenceEnJours = $debut->diffInDays($fin);
    
                // Ajoute la différence au solde
                $solde += $differenceEnJours;
            }
    
            // Ajuste le solde si nécessaire
            if ($solde > 2) {
                $solde = 0;
            } else {
                $solde = 2 - $solde;
            }
        } else {
            // Si aucun congé trouvé, le solde reste à 2
            $solde = 2;
        }
    
        // Mettez à jour le champ solde dans le formulaire
        $this->editConge['sldtotcon'] = $solde;

        // remplir total prix
        $dateDebute = $this->editConge['debutcon'];
        $dateFin = $this->editConge['fincon'];
        $totalPrix = Carbon::parse($dateDebute)->diff(Carbon::parse($dateFin))->d;
        $this->editConge['sldeffcon'] = $totalPrix;

        // remplir solde restant
        // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
        $soldeRestant = $solde - $totalPrix;

        // Mettez à jour le champ "Solde restant".
        $this->editConge['sldrstcon'] = $soldeRestant;
    }


    // pour faire l'ajout
    public function addConge(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $congeData = $validationAttribute["newConge"];
        
        // ajout d'un nouvelle conge
        ModelsConge::create($congeData);

        // reinitialiser newconge 
        $this->newConge = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Conge creer avec succès!"]);
    }

    // pour faire la modification
    public function updateConge(){
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $congeData = $validationAttribute["editConge"];

        // modification
        ModelsConge::find($this->editConge["id"])->update($congeData);

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Conge modifier avec succès!"]);
    }

    // pour la confirmation du supression
    public function confirmDelete($id){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>[
            "text" => "Vous etes sur le point de supprimer cette composant de la liste du conge. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                    "conge_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deleteConge($id){
        ModelsConge::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Conge supprimer avec succès!"]);
    }

}
