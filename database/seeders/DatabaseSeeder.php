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
        Employee::factory(30)->create();
        Vehicule::factory(5)->create();
        User::factory(30)->create();
        
        $this->call(ProfileSeeder::class);
        Mission::factory(5)->create();

        User::find(1)->profiles()->attach(1);
        User::find(2)->profiles()->attach(2);
        User::find(3)->profiles()->attach(3);
        
        $this->call(CongeTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(ReposMedicalTableSeeder::class);
        $this->call(SortiePersonnelTableSeeder::class);
        $this->call(EventSeeder::class);
        

        Mission::find(1)->emploie()->attach(7);
        Mission::find(2)->emploie()->attach(11);
        Mission::find(3)->emploie()->attach(23);
        Mission::find(4)->emploie()->attach(18);
        Mission::find(5)->emploie()->attach(29);
    }
}
