<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Permission as ModelsPermission;
use App\Models\SoldePermission;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionCeAnne extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    // pour les changement du page
    public $currentPage = PAGELIST;

    public $newPermission = [];
    public $editPermission = [];

    public $search = "";

    public function render()
    {
        $date = now()->year;

        $searchCriteria = "%" . $this->search . "%";

        return view('livewire.permission.index', [
            "permissions" => ModelsPermission::whereHas('emploie', function ($query) use ($searchCriteria) {
                $query->where('nom', 'like', '%' . $searchCriteria . '%');
            })
            ->whereYear('debutpermi', '<=', $date)
            ->whereYear('finpermi', '>=', $date)
            ->latest()
            ->paginate(5)
        ], [
            "employees" => Employee::all()
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }


    // plusiere roles
    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
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
    public function goAjouterPermission()
    {
        $this->currentPage = PAGECREATFORM;
    }

    // mandeha @formulaire editer
    public function goEditPermission($id)
    {
        // recuperer tous les valeur du table pour le mettre dans le form a editer
        $this->editPermission = ModelsPermission::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    // mimpoly @liste eo
    public function retourListPermission()
    {
        $this->currentPage = PAGELIST;
        $this->editPermission = [];
    }


    // recuperer le solde du moi en fonction du employee et remplir automatiquement les solde
    public function getSoldeByEmployeeId()
    {
        $employeeId = $this->newPermission['employee_id'];
        $dateDebut = Carbon::parse($this->newPermission['debutpermi']);
        $moisDebut = $dateDebut->month;

        // Utilisation de la clause where pour filtrer par année et mois de début
        $PermissionDuMois = ModelsPermission::whereYear("debutpermi", $dateDebut->year)
            ->whereMonth("debutpermi", $moisDebut)
            ->where("employee_id", $employeeId)
            ->get();

        $solde = 0; // Initialisation du solde à 0

        if ($PermissionDuMois->isNotEmpty()) {
            foreach ($PermissionDuMois as $PermissionDuMoi) {
                $debut = Carbon::parse($PermissionDuMoi->debutpermi);
                $fin = Carbon::parse($PermissionDuMoi->finpermi);

                // Calcul de la différence entre la date de début et de fin en jours
                $differenceEnJours = $debut->diffInDays($fin);

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
        $this->newPermission['sldtotpermi'] = $solde;

        // remplir total prix
        $dateDebute = $this->newPermission['debutpermi'];
        $dateFin = $this->newPermission['finpermi'];
        $totalPrix = Carbon::parse($dateDebute)->diff(Carbon::parse($dateFin))->d;
        $this->newPermission['sldeffpermi'] = $totalPrix;

        // remplir solde restant
        // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
        $soldeRestant = $solde - $totalPrix;

        // Mettez à jour le champ "Solde restant".
        $this->newPermission['sldrstpermi'] = $soldeRestant;
    }


    public function getSoldeByEmployeeIdEdit()
    {
        $employeeId = $this->editPermission['employee_id'];
        $dateDebut = Carbon::parse($this->editPermission['debutpermi']);
        $moisDebut = $dateDebut->month;
        $jourDebut = $dateDebut->day;

        // Utilisation de la clause where pour filtrer par année et mois de début
        $PermissionDuMois = ModelsPermission::whereYear("debutpermi", $dateDebut->year)
            ->whereMonth("debutpermi", $moisDebut)
            ->whereDay("debutpermi", !$jourDebut)
            ->where("employee_id", $employeeId)
            ->get();

        $solde = 0; // Initialisation du solde à 0

        if ($PermissionDuMois->isNotEmpty()) {
            foreach ($PermissionDuMois as $PermissionDuMoi) {
                $debut = Carbon::parse($PermissionDuMoi->debutpermi);
                $fin = Carbon::parse($PermissionDuMoi->finpermi);

                // Calcul de la différence entre la date de début et de fin en jours
                $differenceEnJours = $debut->diffInDays($fin);

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
        $this->editPermission['sldtotpermi'] = $solde;

        // remplir total prix
        $dateDebute = $this->editPermission['debutpermi'];
        $dateFin = $this->editPermission['finpermi'];
        $totalPrix = Carbon::parse($dateDebute)->diff(Carbon::parse($dateFin))->d;
        $this->editPermission['sldeffpermi'] = $totalPrix;

        // remplir solde restant
        // Calculez le "Solde restant" en soustrayant le "Total Prix" du "Solde du mois".
        $soldeRestant = $solde - $totalPrix;

        // Mettez à jour le champ "Solde restant".
        $this->editPermission['sldrstpermi'] = $soldeRestant;
    }


    // pour faire l'ajout
    public function addPermission()
    {

        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $permissionData = $validationAttribute["newPermission"];

        // ajout d'un nouvelle mission
        ModelsPermission::create($permissionData);

        // reinitialiser newMission 
        $this->newPermission = [];

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Permission creer avec succès!"]);
    }

    // pour faire la modification
    public function updatePermission()
    {
        // verifier que les info envoyer par le form sont correct
        $validationAttribute = $this->validate();
        $permissionData = $validationAttribute["editPermission"];

        // modification
        ModelsPermission::find($this->editPermission["id"])->update($permissionData);

        // creer un evenement pour dire que l'enregistrement est effectué
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Permission modifier avec succès!"]);
    }

    // pour la confirmation du supression
    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent("comfirmMessage", ["message" => [
            "text" => "Vous etes sur le point de supprimer cette composant de la liste du mission. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                "permi_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deletePermission($id)
    {
        ModelsPermission::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Permission supprimer avec succès!"]);
    }
}
