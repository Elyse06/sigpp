<?php

namespace Database\Seeders;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SoldeConge;
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
        Conge::factory(2)->create();
        Permission::factory(10)->create();
        RepoMedical::factory(4)->create();
        SortiePersonnel::factory(15)->create();
        Mission::factory(20)->create();
        User::factory(10)->create();
        SoldeConge::factory(50)->create();

        Mission::find(1)->emploie()->attach(7);
        Mission::find(2)->emploie()->attach(8);
        Mission::find(3)->emploie()->attach(6);
        Mission::find(4)->emploie()->attach(3);
        Mission::find(5)->emploie()->attach(9);
        Mission::find(6)->emploie()->attach(4);
        Mission::find(7)->emploie()->attach(2);
        Mission::find(8)->emploie()->attach(10);
        Mission::find(9)->emploie()->attach(5);
        Mission::find(10)->emploie()->attach(1);
    }
}
