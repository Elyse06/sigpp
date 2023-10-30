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

class Solde extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $employees = Employee::all();
        $conges = Conge::all();
        $missions = Mission::all();
        $permissions = Permission::all();
        $sorties = SortiePersonnel::all();
        $repos = RepoMedical::all();

        $searchCriteria = "%".$this->search."%";

        return view('livewire.solde', compact('employees','conges','missions','permissions','sorties','repos'));
    }
}
