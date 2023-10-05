<?php

namespace Database\Seeders;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\MissionEmployee;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
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
        Employee::factory(10)->create();
        Vehicule::factory(10)->create();
        Conge::factory(10)->create();
        Permission::factory(10)->create();
        RepoMedical::factory(10)->create();
        SortiePersonnel::factory(10)->create();
        Mission::factory(10)->create();
        MissionEmployee::factory(10)->create();
    }
}
