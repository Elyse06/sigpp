<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TopMissionController extends Controller
{
    public function index()
    {

        $topEmployeesMission = Employee::select('employees.id', 'employees.nom', DB::raw('COUNT(mission_employees.mission_id) as mission_count'))
        ->join('mission_employees', 'employees.id', '=', 'mission_employees.employee_id')
        ->groupBy('employees.id', 'employees.nom')
        ->orderByDesc('mission_count')
        ->limit(10)
        ->get();

        return view('top.mission.index', compact('topEmployeesMission'));
    }

    public function generatePDF()
    {
        $topEmployeesMission = Employee::select('employees.id', 'employees.nom', DB::raw('COUNT(mission_employees.mission_id) as mission_count'))
        ->join('mission_employees', 'employees.id', '=', 'mission_employees.employee_id')
        ->groupBy('employees.id', 'employees.nom')
        ->orderByDesc('mission_count')
        ->limit(10)
        ->get();

        $pdf = PDF::loadView('top.mission.pdf', compact('topEmployeesMission'));

        $localPath = 'E:';
        $filename = 'Liste-' . now()->format('Y-m-d') . '.pdf';
        $pdf->save($localPath . DIRECTORY_SEPARATOR . $filename);

        $route = route('topmission.downloadPDF', ['filename' => $filename]);
        return redirect()->to($route);
    }


    public function downloadPDF($filename)
    {
        $filePath ='E:\\' . $filename;

        return response()->download($filePath, 'liste.pdf');
    }
}
