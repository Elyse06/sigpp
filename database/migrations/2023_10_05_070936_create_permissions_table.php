<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('sldtotpermi');
            $table->integer('sldeffpermi');
            $table->integer('sldrstpermi');
            $table->date('debutpermi');
            $table->date('finpermi');
            $table->string('motifpermi');
            $table->foreignId('employee_id')->constrained();
            $table->timestamps();
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
        Schema::table('permissions', function(Blueprint $table){
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('permissions');
    }
}
