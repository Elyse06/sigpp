<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TopCongeController extends Controller
{
    public function index()
    {
        $topEmployeesConges = Conge::select('employee_id', DB::raw('COUNT(*) as conge_count'))
        ->groupBy('employee_id')
        ->orderByDesc('conge_count')
        ->limit(10)
        ->get();

        return view('top.conge.index', compact('topEmployeesConges'));
    }

    public function generatePDF()
    {
        $topEmployeesConges = Conge::select('employee_id', DB::raw('COUNT(*) as conge_count'))
        ->groupBy('employee_id')
        ->orderByDesc('conge_count')
        ->limit(10)
        ->get();

        $pdf = PDF::loadView('top.conge.pdf', compact('topEmployeesConges'));

        $localPath = 'E:';
        $filename = 'Liste-' . now()->format('Y-m-d') . '.pdf';
        $pdf->save($localPath . DIRECTORY_SEPARATOR . $filename);

        $route = route('topconge.downloadPDF', ['filename' => $filename]);
        return redirect()->to($route);
    }


    public function downloadPDF($filename)
    {
        $filePath ='E:\\' . $filename;

        return response()->download($filePath, 'liste.pdf');
    }
}
