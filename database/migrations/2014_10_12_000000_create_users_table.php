<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name')->default('Not set');
            $table->string('gender')->nullable(); // no default value and will also BE NULLABLE
            $table->string('id_number')->unique();
            $table->string('email')->unique();
            $table->string('box_number')->default('Not set');
            $table->string('zip_code')->default('Not set');
            $table->string('postal_town')->default('Not set');
            $table->string('total_milk')->default(0);
            $table->string('password');
            $table->tinyInteger('verified')->default(0); // default value of 0 , [0 for false & 1 for true i.e. verified]
            $table->string('email_token')->nullable(); // no default value and will also BE NULLABLE
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
