<?php

namespace App\Http\Controllers;

use App\Models\RepoMedical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TopReposController extends Controller
{
    public function index()
    {
        $topEmployeesRepos = RepoMedical::select('employee_id', DB::raw('COUNT(*) as repos_count'))
        ->groupBy('employee_id')
        ->orderByDesc('repos_count')
        ->limit(10)
        ->get();

        return view('top.repos.index', compact('topEmployeesRepos'));
    }

    public function generatePDF()
    {
        $topEmployeesRepos = RepoMedical::select('employee_id', DB::raw('COUNT(*) as repos_count'))
        ->groupBy('employee_id')
        ->orderByDesc('repos_count')
        ->limit(10)
        ->get();

        $pdf = PDF::loadView('top.repos.pdf', compact('topEmployeesRepos'));

        $localPath = 'E:';
        $filename = 'Liste-' . now()->format('Y-m-d') . '.pdf';
        $pdf->save($localPath . DIRECTORY_SEPARATOR . $filename);

        $route = route('toprepos.downloadPDF', ['filename' => $filename]);
        return redirect()->to($route);
    }


    public function downloadPDF($filename)
    {
        $filePath ='E:\\' . $filename;

        return response()->download($filePath, 'liste.pdf');
    }
}
