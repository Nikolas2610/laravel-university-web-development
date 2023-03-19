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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('fuel_id')->constrained('fuels');
            $table->foreignId('municipality_id')->constrained('municipalities');
            $table->foreignId('county_id')->constrained('counties');
            $table->date('expire_date');
            $table->integer('afm');
            $table->string('name');
            $table->string('address');
            $table->decimal('amount', 8, 2);
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
        Schema::dropIfExists('offers');
    }
};
