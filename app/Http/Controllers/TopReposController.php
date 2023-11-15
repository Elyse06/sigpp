<?php

namespace App\Http\Controllers;

use App\Models\RepoMedical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
