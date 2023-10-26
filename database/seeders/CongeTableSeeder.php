<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CongeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("conges")->insert([
            [
                "sldtotcon" => "2",
                "sldeffcon" => "1",
                "sldrstcon" => "1",
                "debutcon" => "2023-10-16",
                "fincon" => "2023-10-16",
                "motifcon" => "Etude",
                "employee_id" => "3",
                "user_id" => "3",
                "expires_at" => "2023-10-16",
            ],
            [
                "sldtotcon" => "2",
                "sldeffcon" => "1",
                "sldrstcon" => "1",
                "debutcon" => "2023-10-20",
                "fincon" => "2023-10-20",
                "motifcon" => "Famille",
                "employee_id" => "5",
                "user_id" => "5",
                "expires_at" => "2023-10-20",
            ]
        ]);
    }
}
