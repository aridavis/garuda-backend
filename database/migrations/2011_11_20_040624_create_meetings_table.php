<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meeting_type_id');
            $table->foreign('meeting_type_id')->on('meeting_types')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('started')->default(false);
            $table->string('socket_id')->nullable();
            $table->unsignedBigInteger('interviewer_id')->nullable();
            $table->foreign('interviewer_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('meetings');
    }
}
