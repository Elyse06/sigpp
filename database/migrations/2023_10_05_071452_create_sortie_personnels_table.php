<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_personnels', function (Blueprint $table) {
            $table->id();
            $table->integer('sldtotsortie');
            $table->integer('sldeffsortie');
            $table->integer('sldrstsortie');
            $table->date('debutsortie');
            $table->date('finsortie');
            $table->string('motifsortie');
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
        Schema::table('sortie_personnels', function(Blueprint $table){
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('sortie_personnels');
    }
}
