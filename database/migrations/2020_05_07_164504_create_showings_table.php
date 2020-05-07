<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('show_time')->nullable();
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showings');
    }
}
