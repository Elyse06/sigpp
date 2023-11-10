<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permissions")->insert([
            [
                "sldtotpermi" => "8",
                "sldeffpermi" => "3",
                "sldrstpermi" => "5",
                "debutpermi" => "2023-10-16",
                "finpermi" => "2023-10-18",
                "motifpermi" => "Etude",
                "employee_id" => "1",
            ],
            [
                "sldtotpermi" => "8",
                "sldeffpermi" => "2",
                "sldrstpermi" => "6",
                "debutpermi" => "2023-10-20",
                "finpermi" => "2023-10-21",
                "motifpermi" => "Famille",
                "employee_id" => "4",
            ]
        ]);
    }
}
