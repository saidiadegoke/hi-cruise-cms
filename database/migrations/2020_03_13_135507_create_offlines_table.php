<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfflinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double("amount_paid", 8, 2);
            $table->string("reference_no");
            $table->text("account");
            $table->date("date_paid_at");
            $table->string("time_paid_at");
            $table->unsignedTinyInteger("status");
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
        Schema::dropIfExists('offlines');
    }
}
