<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentsDtr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('timeIn')->nullable();
            $table->string('timeIn_hours')->nullable();
            $table->string('timeIn_day')->nullable();
            $table->string('timeIn_fulldate')->nullable();
            $table->string('timeOut')->nullable();
            $table->string('timeOut_hours')->nullable();
            $table->string('timeOut_day')->nullable();
            $table->string('timeOut_fulldate')->nullable();
            $table->string('status')->nullable();
            $table->string('number_hours')->nullable();
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
        Schema::dropIfExists('dtr');
    }
}
