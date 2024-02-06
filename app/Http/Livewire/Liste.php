<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Livewire\Component;
use Livewire\WithPagination;

class Liste extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    // pour les changement du page
    public $currentPage = PAGELIST;

    public $newEmployee = [];
    public $editEmployee = [];

    public $search = "";

    public function render()
    {
        $date = now()->toDateString();

        $searchCriteria = "%".$this->search."%";
        
        $employees = Employee::select('id','nom', 'prenom', 'numTel', 'date_de_naissance', 'adresse')
            ->orderByDesc('nom')
            ->where('nom', 'like', '%' . $searchCriteria . '%')
            ->orwhere('prenom', 'like', '%' . $searchCriteria . '%')
            ->paginate(10);
        $conges = Conge::where('debutcon', '<=', $date)
            ->where('fincon', '>=', $date)
            ->get();
        $missions = Mission::where('debutmis', '<=', $date)
            ->where('finmis', '>=', $date)
            ->get();
        $permissions = Permission::where('debutpermi', '<=', $date)
            ->where('finpermi', '>=', $date)
            ->get();
        $sorties = SortiePersonnel::where('debutsortie', '<=', $date)
            ->where('finsortie', '>=', $date)
            ->get();
        $repos = RepoMedical::where('debutrep', '<=', $date)
            ->where('finrep', '>=', $date)
            ->get();

        return view('livewire.employee.index', compact('employees','conges','missions','permissions','sorties','repos'))
            ->extends('layouts.master')
            ->section('contenu');
    }

    // plusiere roles
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editEmployee.nom' => 'required',
                'editEmployee.prenom' => 'required',
                'editEmployee.date_de_naissance' => 'required',
                'editEmployee.adresse' => 'required',
                'editEmployee.numTel' => 'required',
                'editEmployee.pin' => 'required',
            ];
        }

        return [
            'newEmployee.nom' => 'required',
            'newEmployee.prenom' => 'required',
            'newEmployee.date_de_naissance' => 'required',
            'newEmployee.adresse' => 'required',
            'newEmployee.numTel' => 'required',
            'newEmployee.pin' => 'required',
        ];
    }

    // mandeha @formulaire ajouter
    public function goAjouterEmployee(){
        $this->currentPage = PAGECREATFORM;
    }

    // mandeha @formulaire editer
    public function goEditEmployee($id){
        // recuperer tous les valeur du table pour le mettre dans le form a editer
        $this->editEmployee = Employee::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    // mimpoly @liste eo
    public function retourListEmployee(){
        $this->currentPage = PAGELIST;
        $this->editEmployee = [];
    }

    // pour faire l'ajout
    public function addEmployee()
    {
        $validation = $this->validate();
        $employeeData = $validation["newEmployee"];
        Employee::create($employeeData);
        $this->newEmployee = [];
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Employee creer avec succès!"]);
    }

    // pour la modification
    public function editEmployee()
    {
        $validation = $this->validate();
        $employeeData = $validation["editEmployee"];
        Employee::find($this->editEmployee["id"])->update($employeeData);
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Employee modifier avec succès!"]);
    }

    // pour la confirmation du supression
    public function confirmDelete($id){
        $this->dispatchBrowserEvent("comfirmMessage", ["message"=>[
            "text" => "Vous etes sur le point de supprimer cette personne des Employsées. Voulez-vous continuer?",
            "title" => "Etes-vous sure de continuer?",
            "type" => "warning",
            "data" => [
                    "employee_id" => $id
            ]
        ]]);
    }

    // pour la suppression
    public function deleteEmployee($id){
        Employee::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Conge supprimer avec succès!"]);
    }
}
