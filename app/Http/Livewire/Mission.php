<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Mission as ModelsMission;
use Livewire\Component;
use Livewire\WithPagination;

class Mission extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $btnAjouClick = false;

    public function render()
    {
        return view('livewire.mission.index', [
            "missions" => ModelsMission::paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function ajouterMission(){
        $this->btnAjouClick = true;
    }

}
