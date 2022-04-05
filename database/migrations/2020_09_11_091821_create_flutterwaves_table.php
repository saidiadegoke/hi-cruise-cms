<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlutterwavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flutterwaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount', 10, 4);
            $table->string('reference');
            $table->string('transaction_id');
            $table->string('status');
            $table->string('currency')->nullable();
            $table->datetime('transaction_date');
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
        Schema::dropIfExists('flutterwaves');
    }
}
