<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class Solde extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";
    public $soldeConge = SOLDECONGE;
    public $soldePermission = SOLDEPERMISSION;
    public $soldeSortie = SOLDESORTIE;

    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $date = now()->toDateString();

        $employees = Employee::where("nom", "like", $searchCriteria)->get();

        // Tableau pour stocker les soldes
        $soldeList = [];

        foreach ($employees as $employee) {

            $soldeList[$employee->id] = [
                'conge' => $this->calculateSolde($employee->id),
                'permission' => $this->calculateSoldePermission($employee->id),
                'sortie' => $this->calculateSoldeSortie($employee->id),
            ];
        }


        return view('livewire.employee.solde', compact('employees','soldeList'))
        ->extends('layouts.master')
        ->section('contenu');
    }

    // Fonction pour calculer le solde total
    private function calculateSolde($employeeId)
    {

        // Récupérer la date de création de l'employé
        $dateDebutEmploye = Employee::where('id', $employeeId)->value('created_at');

        // Utilisation de la clause where pour filtrer par année
        $congeTotal = Conge::whereYear("debutcon", '>=', $dateDebutEmploye->year)
            ->where("employee_id", $employeeId)
            ->get();

        $soldeConge = $this->soldeConge;

        $soldeCumule = $soldeConge;
        $soldeCongePris = 0;

        if ($congeTotal->isNotEmpty()) {
            foreach ($congeTotal as $conge) {
                $debut = Carbon::parse($conge->debutcon);
                $fin = Carbon::parse($conge->fincon);

                // Calcul de la différence entre la date de début et de fin en jours
                $differenceEnJours = $debut->diffInDays($fin);

                // Soustrait la différence du soldeCumule
                $soldeCumule -= $differenceEnJours;
                $soldeCongePris += $differenceEnJours;
            }
        }

        // Ajoute 2 jours au soldeCumule pour chaque mois
        $soldeCumule += (now()->diffInMonths($dateDebutEmploye) * $soldeConge);

        // Ajuste le soldeCumule si nécessaire, ne dépassant pas 45 jours
        $soldeCumule = min(45, $soldeCumule);

        // Calcul du solde final
        $soldeFinal = $soldeCumule - $soldeCongePris;

        return $soldeFinal;

    }

    private function calculateSoldePermission($employeeId)
    {
        $dateActuelle = now();
        $moisDebut = $dateActuelle->month;

        // Utilisation de la clause where pour filtrer par année et mois de début
        $PermissionDuMois = Permission::whereYear("debutpermi", $dateActuelle->year)
            ->whereMonth("debutpermi", $moisDebut)
            ->where("employee_id", $employeeId)
            ->get();

        $solde = 0; // Initialisation du solde à 0
        $soldePermission = $this->soldePermission;

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
            if ($solde > $soldePermission) {
                $solde = 0;
            } else {
                $solde = $soldePermission - $solde;
            }
        } else {
            // Si aucun congé trouvé, le solde reste à 2
            $solde = $soldePermission;
        }

        return $solde;
    }

    private function calculateSoldeSortie($employeeId)
    {
            $dateActuelle = now();
            $moisActuelle = $dateActuelle->month;
        
            // Utilisation de la clause where pour filtrer par année et mois de début
            $SortieDuMois = SortiePersonnel::whereYear("debutsortie", $dateActuelle->year)
                ->whereMonth("debutsortie", $moisActuelle)
                ->where("employee_id", $employeeId)
                ->get();
        
            $solde = 0; // Initialisation du solde à 0
            $soldeSortie = $this->soldeSortie;
        
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
                if ($solde > $soldeSortie) {
                    $solde = 0;
                } else {
                    $solde = $soldeSortie - $solde;
                }
            } else {
                // Si aucun congé trouvé, le solde reste à 2
                $solde = $soldeSortie;
            }

            return $solde;
    }

    public function generatePDF()
    {
        $employees = Employee::all();

        // Tableau pour stocker les soldes
        $soldeList = [];

        foreach ($employees as $employee) {

            $soldeList[$employee->id] = [
                'conge' => $this->calculateSolde($employee->id),
                'permission' => $this->calculateSoldePermission($employee->id),
                'sortie' => $this->calculateSoldeSortie($employee->id),
            ];
        }

        $pdf = PDF::loadView('livewire.employee.pdf', compact('employees','soldeList'));

        $localPath = 'E:';
        $filename = 'Liste-' . now()->format('Y-m-d') . '.pdf';
        $pdf->save($localPath . DIRECTORY_SEPARATOR . $filename); // Sauvegardez le PDF

        $route = route('rapport.downloadPDF', ['filename' => $filename]);
        return redirect()->to($route);
    }


    public function downloadPDF($filename)
    {
        $filePath ='E:\\' . $filename;

        return response()->download($filePath, 'liste.pdf');
    }

}
