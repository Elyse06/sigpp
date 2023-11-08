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

        $currentYear = now()->year;
        $m_year = Mission::whereYear('debutmis', $currentYear)->whereYear('finmis', $currentYear)->get();
        $c_year = Conge::whereYear('debutcon', $currentYear)->whereYear('fincon', $currentYear)->get();
        $p_year = Permission::whereYear('debutpermi', $currentYear)->whereYear('finpermi', $currentYear)->get();
        $s_year = SortiePersonnel::whereYear('debutsortie', $currentYear)->whereYear('finsortie', $currentYear)->get();
        $r_year = RepoMedical::whereYear('debutrep', $currentYear)->whereYear('finrep', $currentYear)->get();

            if($m_year)
            {
                $m_jan = Mission::where(function($query) {$query->whereMonth('debutmis', 1)->orWhere(function($query) {$query->whereMonth('finmis', 1)->whereNull('debutmis');});})->count();
                $m_fev = Mission::where(function($query) {$query->whereMonth('debutmis', 2)->orWhere(function($query) {$query->whereMonth('finmis', 2)->whereNull('debutmis');});})->count();
                $m_mar = Mission::where(function($query) {$query->whereMonth('debutmis', 3)->orWhere(function($query) {$query->whereMonth('finmis', 3)->whereNull('debutmis');});})->count();
                $m_avr = Mission::where(function($query) {$query->whereMonth('debutmis', 4)->orWhere(function($query) {$query->whereMonth('finmis', 4)->whereNull('debutmis');});})->count();
                $m_mai = Mission::where(function($query) {$query->whereMonth('debutmis', 5)->orWhere(function($query) {$query->whereMonth('finmis', 5)->whereNull('debutmis');});})->count();
                $m_jun = Mission::where(function($query) {$query->whereMonth('debutmis', 6)->orWhere(function($query) {$query->whereMonth('finmis', 6)->whereNull('debutmis');});})->count();
                $m_jul = Mission::where(function($query) {$query->whereMonth('debutmis', 7)->orWhere(function($query) {$query->whereMonth('finmis', 7)->whereNull('debutmis');});})->count();
                $m_aou = Mission::where(function($query) {$query->whereMonth('debutmis', 8)->orWhere(function($query) {$query->whereMonth('finmis', 8)->whereNull('debutmis');});})->count();
                $m_sep = Mission::where(function($query) {$query->whereMonth('debutmis', 9)->orWhere(function($query) {$query->whereMonth('finmis', 9)->whereNull('debutmis');});})->count();
                $m_oct = Mission::where(function($query) {$query->whereMonth('debutmis', 10)->orWhere(function($query) {$query->whereMonth('finmis', 10)->whereNull('debutmis');});})->count();
                $m_nov = Mission::where(function($query) {$query->whereMonth('debutmis', 11)->orWhere(function($query) {$query->whereMonth('finmis', 11)->whereNull('debutmis');});})->count();
                $m_dec = Mission::where(function($query) {$query->whereMonth('debutmis', 12)->orWhere(function($query) {$query->whereMonth('finmis', 12)->whereNull('debutmis');});})->count();
            }

            if($c_year)
            {
                $c_jan = Conge::whereMonth('debutcon', 1)->whereMonth('fincon', 1)->get()->count();
                $c_fev = Conge::whereMonth('debutcon', 2)->whereMonth('fincon', 2)->get()->count();
                $c_mar = Conge::whereMonth('debutcon', 3)->whereMonth('fincon', 3)->get()->count();
                $c_avr = Conge::whereMonth('debutcon', 4)->whereMonth('fincon', 4)->get()->count();
                $c_mai = Conge::whereMonth('debutcon', 5)->whereMonth('fincon', 5)->get()->count();
                $c_jun = Conge::whereMonth('debutcon', 6)->whereMonth('fincon', 6)->get()->count();
                $c_jul = Conge::whereMonth('debutcon', 7)->whereMonth('fincon', 7)->get()->count();
                $c_aou = Conge::whereMonth('debutcon', 8)->whereMonth('fincon', 8)->get()->count();
                $c_sep = Conge::whereMonth('debutcon', 9)->whereMonth('fincon', 9)->get()->count();
                $c_oct = Conge::whereMonth('debutcon', 10)->whereMonth('fincon', 10)->get()->count();
                $c_nov = Conge::whereMonth('debutcon', 11)->whereMonth('fincon', 11)->get()->count();
                $c_dec = Conge::whereMonth('debutcon', 12)->whereMonth('fincon', 12)->get()->count();
            }

            if($p_year)
            {
                $p_jan = Permission::whereMonth('debutpermi', 1)->whereMonth('finpermi', 1)->get()->count();
                $p_fev = Permission::whereMonth('debutpermi', 2)->whereMonth('finpermi', 2)->get()->count();
                $p_mar = Permission::whereMonth('debutpermi', 3)->whereMonth('finpermi', 3)->get()->count();
                $p_avr = Permission::whereMonth('debutpermi', 4)->whereMonth('finpermi', 4)->get()->count();
                $p_mai = Permission::whereMonth('debutpermi', 5)->whereMonth('finpermi', 5)->get()->count();
                $p_jun = Permission::whereMonth('debutpermi', 6)->whereMonth('finpermi', 6)->get()->count();
                $p_jul = Permission::whereMonth('debutpermi', 7)->whereMonth('finpermi', 7)->get()->count();
                $p_aou = Permission::whereMonth('debutpermi', 8)->whereMonth('finpermi', 8)->get()->count();
                $p_sep = Permission::whereMonth('debutpermi', 9)->whereMonth('finpermi', 9)->get()->count();
                $p_oct = Permission::whereMonth('debutpermi', 10)->whereMonth('finpermi', 10)->get()->count();
                $p_nov = Permission::whereMonth('debutpermi', 11)->whereMonth('finpermi', 11)->get()->count();
                $p_dec = Permission::whereMonth('debutpermi', 12)->whereMonth('finpermi', 12)->get()->count();
            }

            if($s_year)
            {
                $s_jan = SortiePersonnel::whereMonth('debutsortie', 1)->whereMonth('finsortie', 1)->get()->count();
                $s_fev = SortiePersonnel::whereMonth('debutsortie', 2)->whereMonth('finsortie', 2)->get()->count();
                $s_mar = SortiePersonnel::whereMonth('debutsortie', 3)->whereMonth('finsortie', 3)->get()->count();
                $s_avr = SortiePersonnel::whereMonth('debutsortie', 4)->whereMonth('finsortie', 4)->get()->count();
                $s_mai = SortiePersonnel::whereMonth('debutsortie', 5)->whereMonth('finsortie', 5)->get()->count();
                $s_jun = SortiePersonnel::whereMonth('debutsortie', 6)->whereMonth('finsortie', 6)->get()->count();
                $s_jul = SortiePersonnel::whereMonth('debutsortie', 7)->whereMonth('finsortie', 7)->get()->count();
                $s_aou = SortiePersonnel::whereMonth('debutsortie', 8)->whereMonth('finsortie', 8)->get()->count();
                $s_sep = SortiePersonnel::whereMonth('debutsortie', 9)->whereMonth('finsortie', 9)->get()->count();
                $s_oct = SortiePersonnel::whereMonth('debutsortie', 10)->whereMonth('finsortie', 10)->get()->count();
                $s_nov = SortiePersonnel::whereMonth('debutsortie', 11)->whereMonth('finsortie', 11)->get()->count();
                $s_dec = SortiePersonnel::whereMonth('debutsortie', 12)->whereMonth('finsortie', 12)->get()->count();
            }

            if($r_year)
            {
                $r_jan =RepoMedical::whereMonth('debutrep', 1)->whereMonth('finrep', 1)->get()->count();
                $r_fev =RepoMedical::whereMonth('debutrep', 2)->whereMonth('finrep', 2)->get()->count();
                $r_mar =RepoMedical::whereMonth('debutrep', 3)->whereMonth('finrep', 3)->get()->count();
                $r_avr =RepoMedical::whereMonth('debutrep', 4)->whereMonth('finrep', 4)->get()->count();
                $r_mai =RepoMedical::whereMonth('debutrep', 5)->whereMonth('finrep', 5)->get()->count();
                $r_jun =RepoMedical::whereMonth('debutrep', 6)->whereMonth('finrep', 6)->get()->count();
                $r_jul =RepoMedical::whereMonth('debutrep', 7)->whereMonth('finrep', 7)->get()->count();
                $r_aou =RepoMedical::whereMonth('debutrep', 8)->whereMonth('finrep', 8)->get()->count();
                $r_sep =RepoMedical::whereMonth('debutrep', 9)->whereMonth('finrep', 9)->get()->count();
                $r_oct =RepoMedical::whereMonth('debutrep', 10)->whereMonth('finrep', 10)->get()->count();
                $r_nov =RepoMedical::whereMonth('debutrep', 11)->whereMonth('finrep', 11)->get()->count();
                $r_dec =RepoMedical::whereMonth('debutrep', 12)->whereMonth('finrep', 12)->get()->count();
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
            'm_dec', 'c_dec', 'p_dec', 's_dec', 'r_dec'
        ));
    }
}
