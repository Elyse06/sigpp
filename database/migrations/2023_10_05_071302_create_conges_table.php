<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->integer('sldtotcon');
            $table->integer('sldeffcon');
            $table->integer('sldrstcon');
            $table->date('debutcon');
            $table->date('fincon');
            $table->string('motifcon');
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
        Schema::table('conges', function(Blueprint $table){
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('conges');
    }
}
