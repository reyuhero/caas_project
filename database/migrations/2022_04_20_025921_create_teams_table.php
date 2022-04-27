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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('ownership')->nullable();
            $table->string('logo_url', 2083)->nullable();
            $table->text('description')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('payment_verified_members')->nullable();
            $table->timestamps();
        });
    }

    /**
     * *----- Reverse the migrations. -----*
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
