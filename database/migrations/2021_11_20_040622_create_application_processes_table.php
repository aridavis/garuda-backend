<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->on('applications')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('meeting_id')->nullable();
            $table->foreign('meeting_id')->on('meetings')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('basic_test_id')->nullable();
            $table->foreign('basic_test_id')->on('basic_tests')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('order');
            $table->string('result');
            $table->boolean('pass');
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
        Schema::dropIfExists('application_processes');
    }
}
