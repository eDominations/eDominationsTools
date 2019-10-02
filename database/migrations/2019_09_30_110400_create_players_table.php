<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('ID');
            $table->text('Name')->nullable();
            $table->text('Level')->nullable();
            $table->text('CS')->nullable();
            $table->integer('Strength')->nullable();
            $table->integer('LastSeen')->nullable();
            $table->integer('DMG1HIT')->nullable();
            $table->integer('TotalDMG')->nullable();
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
        Schema::dropIfExists('players');
    }
}
