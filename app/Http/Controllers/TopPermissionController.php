<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
