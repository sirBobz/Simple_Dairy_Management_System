<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilkDetilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milkDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('farmerDairyNum');
            $table->string('farmerName')->default(0);
            $table->string('milk_weight')->default(0);
            $table->string('farmer_ID')->default(0);
            $table->string('milk_Rate')->default(0);
            $table->string('total_Amount')->default(0); 
            $table->string('milk_condition')->nullable(); // no default value and will also BE NULLABLE
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('milkDetails');
    }
}
