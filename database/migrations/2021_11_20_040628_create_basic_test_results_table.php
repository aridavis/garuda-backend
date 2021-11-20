<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_test_results', function (Blueprint $table) {
            $table->id();
            $table->string('user_answer');
            $table->unsignedBigInteger('application_process_id');
            $table->foreign('application_process_id')->on('application_processes')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('basic_test_question_id');
            $table->foreign('basic_test_question_id')->on('basic_test_questions')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('basic_test_results');
    }
}
