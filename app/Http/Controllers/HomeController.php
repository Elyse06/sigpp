<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $topEmployeesMission = Employee::select('employees.id', 'employees.nom', DB::raw('COUNT(mission_employees.mission_id) as mission_count'))
        ->join('mission_employees', 'employees.id', '=', 'mission_employees.employee_id')
        ->groupBy('employees.id', 'employees.nom')
        ->orderByDesc('mission_count')
        ->limit(10)
        ->get();



        $topEmployeesCon = Conge::select('employee_id', DB::raw('COUNT(*) as conge_count'))
        ->groupBy('employee_id')
        ->orderByDesc('conge_count')
        ->limit(10)
        ->get();

        $topEmployeesPermi = Permission::select('employee_id', DB::raw('COUNT(*) as permission_count'))
        ->groupBy('employee_id')
        ->orderByDesc('permission_count')
        ->limit(10)
        ->get();

        $topEmployeesSortie = SortiePersonnel::select('employee_id', DB::raw('COUNT(*) as sortie_count'))
        ->groupBy('employee_id')
        ->orderByDesc('sortie_count')
        ->limit(10)
        ->get();

        $topEmployeesRep = RepoMedical::select('employee_id', DB::raw('COUNT(*) as repos_count'))
        ->groupBy('employee_id')
        ->orderByDesc('repos_count')
        ->limit(10)
        ->get();

        $currentYear = now()->year;
            if($currentYear)
            {
                $m_jan = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 1)->get()->count();
                $m_fev = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 2)->get()->count();
                $m_mar = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 3)->get()->count();
                $m_avr = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 4)->get()->count();
                $m_mai = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 5)->get()->count();
                $m_jun = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 6)->get()->count();
                $m_jul = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 7)->get()->count();
                $m_aou = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 8)->get()->count();
                $m_sep = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 9)->get()->count();
                $m_oct = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 10)->get()->count();
                $m_nov = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 11)->get()->count();
                $m_dec = Mission::whereYear('debutmis', $currentYear)->whereMonth('debutmis', 12)->get()->count();
            }
            if($currentYear)
            {
                $c_jan = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 1)->get()->count();
                $c_fev = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 2)->get()->count();
                $c_mar = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 3)->get()->count();
                $c_avr = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 4)->get()->count();
                $c_mai = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 5)->get()->count();
                $c_jun = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 6)->get()->count();
                $c_jul = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 7)->get()->count();
                $c_aou = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 8)->get()->count();
                $c_sep = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 9)->get()->count();
                $c_oct = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 10)->get()->count();
                $c_nov = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 11)->get()->count();
                $c_dec = Conge::whereYear('debutcon', $currentYear)->whereMonth('debutcon', 12)->get()->count();
            }
            if($currentYear)
            {
                $p_jan = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 1)->get()->count();
                $p_fev = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 2)->get()->count();
                $p_mar = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 3)->get()->count();
                $p_avr = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 4)->get()->count();
                $p_mai = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 5)->get()->count();
                $p_jun = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 6)->get()->count();
                $p_jul = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 7)->get()->count();
                $p_aou = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 8)->get()->count();
                $p_sep = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 9)->get()->count();
                $p_oct = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 10)->get()->count();
                $p_nov = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 11)->get()->count();
                $p_dec = Permission::whereYear('debutpermi', $currentYear)->whereMonth('debutpermi', 12)->get()->count();
            }
            if($currentYear)
            {
                $s_jan = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 1)->get()->count();
                $s_fev = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 2)->get()->count();
                $s_mar = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 3)->get()->count();
                $s_avr = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 4)->get()->count();
                $s_mai = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 5)->get()->count();
                $s_jun = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 6)->get()->count();
                $s_jul = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 7)->get()->count();
                $s_aou = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 8)->get()->count();
                $s_sep = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 9)->get()->count();
                $s_oct = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 10)->get()->count();
                $s_nov = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 11)->get()->count();
                $s_dec = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereMonth('debutsortie', 12)->get()->count();
            }
            if($currentYear)
            {
                $r_jan =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 1)->get()->count();
                $r_fev =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 2)->get()->count();
                $r_mar =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 3)->get()->count();
                $r_avr =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 4)->get()->count();
                $r_mai =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 5)->get()->count();
                $r_jun =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 6)->get()->count();
                $r_jul =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 7)->get()->count();
                $r_aou =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 8)->get()->count();
                $r_sep =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 9)->get()->count();
                $r_oct =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 10)->get()->count();
                $r_nov =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 11)->get()->count();
                $r_dec =RepoMedical::whereYear('debutrep', $currentYear)->whereMonth('debutrep', 12)->get()->count();
            }

        
    	return view('home', compact(
            'm_jan', 'c_jan', 'p_jan', 's_jan', 'r_jan',
            'm_fev', 'c_fev', 'p_fev', 's_fev', 'r_fev',
            'm_mar', 'c_mar', 'p_mar', 's_mar', 'r_mar',
            'm_avr', 'c_avr', 'p_avr', 's_avr', 'r_avr',
            'm_mai', 'c_mai', 'p_mai', 's_mai', 'r_mai',
            'm_jun', 'c_jun', 'p_jun', 's_jun', 'r_jun',
            'm_jul', 'c_jul', 'p_jul', 's_jul', 'r_jul',
            'm_aou', 'c_aou', 'p_aou', 's_aou', 'r_aou',
            'm_sep', 'c_sep', 'p_sep', 's_sep', 'r_sep',
            'm_oct', 'c_oct', 'p_oct', 's_oct', 'r_oct',
            'm_nov', 'c_nov', 'p_nov', 's_nov', 'r_nov',
            'm_dec', 'c_dec', 'p_dec', 's_dec', 'r_dec',
            'topEmployeesCon', 'topEmployeesPermi', 'topEmployeesSortie', 'topEmployeesRep','topEmployeesMission'
        ));
    }
}
