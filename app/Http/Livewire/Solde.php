<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Solde extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {

        $searchCriteria = "%".$this->search."%";

        return view('livewire.solde',[
            "employees" => Employee::where("nom", "like", $searchCriteria)->latest()->paginate(5)
        ]);
    }
}
