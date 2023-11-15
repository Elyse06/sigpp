<?php

namespace App\Http\Controllers;

use App\Models\SortiePersonnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TopSortieController extends Controller
{
    public function index()
    {
        $topEmployeesSortie = SortiePersonnel::select('employee_id', DB::raw('COUNT(*) as sortie_count'))
        ->groupBy('employee_id')
        ->orderByDesc('sortie_count')
        ->limit(10)
        ->get();

        return view('top.sortie.index', compact('topEmployeesSortie'));
    }

    public function generatePDF()
    {
        $topEmployeesSortie = SortiePersonnel::select('employee_id', DB::raw('COUNT(*) as sortie_count'))
        ->groupBy('employee_id')
        ->orderByDesc('sortie_count')
        ->limit(10)
        ->get();


        $pdf = PDF::loadView('top.sortie.pdf', compact('topEmployeesSortie'));

        $localPath = 'E:';
        $filename = 'Liste-' . now()->format('Y-m-d') . '.pdf';
        $pdf->save($localPath . DIRECTORY_SEPARATOR . $filename);

        $route = route('topsortie.downloadPDF', ['filename' => $filename]);
        return redirect()->to($route);
    }


    public function downloadPDF($filename)
    {
        $filePath ='E:\\' . $filename;

        return response()->download($filePath, 'liste.pdf');
    }
}
