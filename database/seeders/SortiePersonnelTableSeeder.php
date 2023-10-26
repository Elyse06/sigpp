<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SortiePersonnelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sortie_personnels")->insert([
            [
                "sldtotsortie" => "4",
                "sldeffsortie" => "1",
                "sldrstsortie" => "3",
                "debutsortie" => "2023-10-16",
                "finsortie" => "2023-10-16",
                "motifsortie" => "Etude",
                "employee_id" => "2",
                "user_id" => "2",
                "expires_at" => "2023-10-16",
            ],
            [
                "sldtotsortie" => "4",
                "sldeffsortie" => "1",
                "sldrstsortie" => "3",
                "debutsortie" => "2023-10-20",
                "finsortie" => "2023-10-20",
                "motifsortie" => "Famille",
                "employee_id" => "6",
                "user_id" => "6",
                "expires_at" => "2023-10-20",
            ]
        ]);
    }
}
