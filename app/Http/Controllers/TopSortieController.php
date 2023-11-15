<?php

namespace App\Http\Controllers;

use App\Models\SortiePersonnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
