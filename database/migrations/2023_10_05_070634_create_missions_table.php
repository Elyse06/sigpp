<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('lieumis');
            $table->date('debutmis');
            $table->date('finmis');
            $table->string('motifmis');
            $table->foreignId('vehicule_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missions', function(Blueprint $table){
            $table->dropForeign(['vehicule_id']);
        });
        Schema::dropIfExists('missions');
    }
}
