<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('nr')->nullable();
            $table->string('name');
            $table->string('text');
            $table->integer('id_user_assigned');
            $table->integer('id_author');
            $table->integer('status');
            $table->integer('priority');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->float('execution_time')->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
