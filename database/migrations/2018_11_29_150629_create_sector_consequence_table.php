<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorConsequenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_consequence', function (Blueprint $table) {
            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->integer('consequence_id')->unsigned();
            $table->foreign('consequence_id')->references('id')->on('consequences');
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
        Schema::dropIfExists('sector_consequence');
    }
}
