<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TopPermissionController extends Controller
{
    public function index()
    {
        $topEmployeesPermissions = Permission::select('employee_id', DB::raw('COUNT(*) as permission_count'))
        ->groupBy('employee_id')
        ->orderByDesc('permission_count')
        ->limit(10)
        ->get();

        return view('top.permission.index', compact('topEmployeesPermissions'));
    }

    public function generatePDF()
    {
        $topEmployeesPermissions = Permission::select('employee_id', DB::raw('COUNT(*) as permission_count'))
        ->groupBy('employee_id')
        ->orderByDesc('permission_count')
        ->limit(10)
        ->get();

        $pdf = PDF::loadView('top.permission.pdf', compact('topEmployeesPermissions'));

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
