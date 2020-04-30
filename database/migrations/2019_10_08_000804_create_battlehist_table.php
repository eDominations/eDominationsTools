<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattlehistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battlehist', function (Blueprint $table) {
            $table->increments('ID');
            $table->text('Attacker')->nullable();
            $table->text('Defender')->nullable();
            $table->text('Region')->nullable();
            $table->text('Type')->nullable();
            $table->timestamp('Date')->nullable();
            $table->integer('Round')->nullable();
            $table->integer('RoundAtt')->nullable();
            $table->integer('RoundDef')->nullable();
            $table->integer('Wall1')->nullable();
            $table->integer('Wall2')->nullable();
            $table->integer('Wall3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battlehist');
    }
}
