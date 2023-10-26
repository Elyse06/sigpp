<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldeCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solde_conges', function (Blueprint $table) {
            $table->id();
            $table->integer('solde');
            $table->foreignId('employee_id')->unique()->constrained();
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
        Schema::table('solde_conges', function(Blueprint $table){
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('solde_conges');
    }
}
