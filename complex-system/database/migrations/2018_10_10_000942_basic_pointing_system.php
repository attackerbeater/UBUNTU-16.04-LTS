<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BasicPointingSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable()->index('team_id')->after('password');
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedInteger('team_id')->index('team_id');
            $table->timestamps();
        });

        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('value')->index('value');
            $table->unsignedInteger('ticket_id')->index('ticket_id');
            $table->unsignedInteger('owner_id')->index('owner_id');
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
        Schema::dropIfExists('points');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('teams');
        Schema::table('users', function($table) {
           $table->dropColumn('team_id');
       });
    }
}