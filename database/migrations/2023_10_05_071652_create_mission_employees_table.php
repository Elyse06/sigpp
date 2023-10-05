<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_employees', function (Blueprint $table) {
            $table->foreignId('mission_id')->constrained();
            $table->foreignId('employee_id')->constrained();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mission_employees', function(Blueprint $table){
            $table->dropForeign(['mission_id', 'employee_id']);
        });
        Schema::dropIfExists('mission_employees');
    }
}
