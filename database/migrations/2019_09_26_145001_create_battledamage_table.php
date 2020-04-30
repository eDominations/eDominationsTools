<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattleDamageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battledamage', function (Blueprint $table) {
            $table->increments('ID');
            $table->text('Name')->nullable();
            $table->text('Side')->nullable();
            $table->text('DMG')->nullable();
            $table->integer('Hits')->nullable();
            $table->integer('Unit')->nullable();
            $table->text('CountrySlug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battledamage');
    }
}
