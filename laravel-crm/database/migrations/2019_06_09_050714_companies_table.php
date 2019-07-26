<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('companies', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name', 60);
        $table->string('email');
        $table->string('website')->nullable();
        $table->string('address')->nullable();
        $table->string('logo')->nullable();
        $table->unsignedInteger('creator_id');
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
      Schema::dropIfExists('companies');
    }
}
