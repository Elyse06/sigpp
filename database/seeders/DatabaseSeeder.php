<?php

namespace Database\Seeders;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SoldeConge;
use App\Models\SoldePermission;
use App\Models\SoldeSortie;
use App\Models\SortiePersonnel;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory(50)->create();
        Vehicule::factory(5)->create();
        Conge::factory(1)->create();
        Permission::factory(2)->create();
        RepoMedical::factory(1)->create();
        SortiePersonnel::factory(4)->create();
        Mission::factory(5)->create();
        User::factory(10)->create();
        SoldeConge::factory(50)->create();
        SoldePermission::factory(50)->create();
        SoldeSortie::factory(50)->create();

        Mission::find(1)->emploie()->attach(7);
        Mission::find(2)->emploie()->attach(41);
        Mission::find(3)->emploie()->attach(23);
        Mission::find(4)->emploie()->attach(18);
        Mission::find(5)->emploie()->attach(32);
    }
}
