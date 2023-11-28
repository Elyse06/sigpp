<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('user_profiles', function (Blueprint $table) {
    //         $table->foreignId("user_id")->constrained();
    //         $table->foreignId("profile_id")->constrained();
    //     });

    //     Schema::enableForeignKeyConstraints();
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::table('user_profiles', function (Blueprint $table) {
    //         $table->dropForeign("user_id");
    //         $table->dropForeign("profile_id");
    //     });

    //     Schema::dropIfExists('user_profiles');
    // }

    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users'); // Définition de la clé étrangère vers la table users
            $table->foreignId('profile_id')->constrained('profiles'); // Définition de la clé étrangère vers la table profiles
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
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['profile_id']);
        });

        Schema::dropIfExists('user_profiles');
    }
}

