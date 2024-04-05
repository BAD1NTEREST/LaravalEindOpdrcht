<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ritten', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->text('pickup_location');
            $table->text('dropoff_location');
            $table->dateTime('scheduled_pickup_time')->nullable();
            $table->dateTime('scheduled_dropoff_time');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Verwijst naar gebruikers tabel
            $table->decimal('distance', 8, 2)->nullable(); // Voeg de distance kolom toe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ritten');
    }
};


