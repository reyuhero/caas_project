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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('duration')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->string('method')->nullable();
            $table->integer('total_budget')->nullable();
            $table->integer('montly_budget')->nullable();
            $table->integer('team_size')->nullable();
            $table->string('scope')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('team_id')->nullable();

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
        Schema::dropIfExists('projects');
    }
};
