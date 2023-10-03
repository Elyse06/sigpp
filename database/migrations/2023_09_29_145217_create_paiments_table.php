<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiments', function (Blueprint $table) {
            $table->id();
            $table->double('montantPaye');
            $table->dateTime('datePaiement');
            $table->foreignId('user_id');
            $table->foreignId('location_id');
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
        Schema::table('paiments', function(Blueprint $table){
            $table->dropForeign(['user_id','location_id']);
        });

        Schema::dropIfExists('paiments');
    }
}
