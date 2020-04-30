<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMudetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mudetails', function (Blueprint $table) {
            $table->increments('ID');
            $table->text('MilitaryUnit')->nullable();
            $table->text('Country')->nullable();
            $table->integer('DailyOrder')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mudetails');
    }
}
