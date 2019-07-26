<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaravelTestTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('leveranciers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier_name');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('leveranciers_id')->nullable()->index('leveranciers_id')->after('password');
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedInteger('leveranciers_id')->index('leveranciers_id');
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
        Schema::dropIfExists('leveranciers');
        Schema::table('users', function($table) {
            $table->dropColumn('leveranciers_id');
        });
    }
}
