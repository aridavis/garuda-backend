<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->on('jobs')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('order');
            $table->unsignedBigInteger('step_id');
            $table->foreign('step_id')->on('steps')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('meeting_type_id')->nullable();
            $table->foreign('meeting_type_id')->on('meeting_types')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('job_steps');
    }
}
