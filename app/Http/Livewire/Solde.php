<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class Solde extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $searchCriteria = "%".$this->search."%";

        $employees = Employee::where("nom", "like", $searchCriteria)->get();
        $conges = Conge::all();
        $missions = Mission::all();
        $permissions = Permission::all();
        $sorties = SortiePersonnel::all();
        $repos = RepoMedical::all();

        return view('livewire.solde.index', compact('employees','conges','missions','permissions','sorties','repos'));
    }

    public function generatePDF()
    {
        $employees = Employee::all();

        $pdf = PDF::loadView('livewire.solde.pdf', compact('employees'));

        $localPath = 'F:\P\Project\ADES\sigpp\pdf';
        $filename = 'Liste-' . now()->format('Y-m-d') . '.pdf';
        $pdf->save($localPath . DIRECTORY_SEPARATOR . $filename); // Sauvegardez le PDF

        $route = route('rapport.downloadPDF', ['filename' => $filename]);
        return redirect()->to($route);
    }


    public function downloadPDF($filename)
    {
        $filePath ='F:\P\Project\ADES\sigpp\pdf\\' . $filename;

        return response()->download($filePath, 'liste.pdf');
    }

}
