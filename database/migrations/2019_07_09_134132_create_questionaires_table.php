<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('organization');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('event_type');
            $table->unsignedTinyInteger('guests');
            $table->date('event_date');
            $table->string('catering');
            $table->string('yatch_state');
            $table->string('event_duration');
            $table->string('event_setup_duration');
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
        Schema::dropIfExists('questionaires');
    }
}
