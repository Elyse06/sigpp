<?php

namespace App\Http\Livewire;

use App\Models\Permission as ModelsPermission;
use App\Models\SoldePermission;
use Illuminate\Support\Facades\DB;
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

    public $search = "";

public function render()
    {

        $searchCriteria = "%".$this->search."%";

        return view('livewire.permission.index', [
            "permissions" => ModelsPermission::whereHas('emploie', function ($query) use ($searchCriteria){
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

        // remplir le solde restant
        public function remplirSoldeRestant()
        {
            // Récupérez le "Solde du mois" et le "Total Prix" depuis le modèle.
            $soldeDuMois = $this->newPermission['sldtotpermi'];
            $totalPrix = $this->newPermission['sldeffpermi'];
    
            // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
            $soldeRestant = $soldeDuMois - $totalPrix;
    
            // Mettez à jour le champ "Solde restant".
            $this->newPermission['sldrstpermi'] = $soldeRestant;
        }
    
        public function remplirSoldeRestantEdit()
        {
            // Récupérez le "Solde du mois" et le "Total Prix" depuis le modèle.
            $soldeDuMois = $this->editPermission['sldtotpermi'];
            $totalPrix = $this->editPermission['sldeffpermi'];
    
            // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
            $soldeRestant = $soldeDuMois - $totalPrix;
    
            // Mettez à jour le champ "Solde restant".
            $this->editPermission['sldrstpermi'] = $soldeRestant;
        }
    
        // recuperer le solde du moi en fonction du employee
        public function getSoldeByEmployeeId()
        {
            // Effectuez ici la requête pour récupérer le solde du mois en fonction de l'ID de l'employé.
            $employeeId = $this->newPermission['employee_id'];
    
            // Remplacez le code suivant par votre propre logique de requête.
            $solde = DB::table('solde_permissions')
                ->where('employee_id', $employeeId)
                ->value('solde');
    
            $this->newPermission['sldtotpermi'] = $solde;
        }
    
        public function getSoldeByEmployeeIdEdit()
        {
            // Effectuez ici la requête pour récupérer le solde du mois en fonction de l'ID de l'employé.
            $employeeId = $this->editPermission['employee_id'];
    
            // Remplacez le code suivant par votre propre logique de requête.
            $solde = DB::table('solde_permissions')
                ->where('employee_id', $employeeId)
                ->value('solde');
    
            $this->editPermission['sldtotpermi'] = $solde;
        }


    // pour faire l'ajout
    public function addPermission(){

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $permissionData = $validationAttribute["newPermission"];
        $permissionData['expires_at'] = $permissionData['finpermi'];
        $solde = $permissionData['sldrstpermi'];
        $idemploi = $permissionData['employee_id'];
        
        // ajout d'un nouvelle mission
        ModelsPermission::create($permissionData);
        SoldePermission::where('employee_id',$idemploi)->update(['solde' => $solde]);

        // reinitialiser newMission 
        $this->newPermission = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Permission creer avec succès!"]);
    }

    // pour faire la modification
    public function updatePermission(){
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $permissionData = $validationAttribute["editPermission"];
        $solde = $permissionData['sldrstpermi'];
        $idemploi = $permissionData['employee_id'];

        // modification
        ModelsPermission::find($this->editPermission["id"])->update($permissionData);
        SoldePermission::where('employee_id',$idemploi)->update(['solde' => $solde]);

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