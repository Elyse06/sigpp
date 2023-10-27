<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReposMedicalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("repo_medicals")->insert([
            [
                "debutrep" => "2023-10-16",
                "finrep" => "2023-10-22",
                "motifrep" => "Palu",
                "employee_id" => "7",
                "expires_at" => "2023-10-22",
            ]
        ]);
    }
}
