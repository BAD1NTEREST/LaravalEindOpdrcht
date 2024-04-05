<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    public function up()
    {
        Schema::table('ritten', function (Blueprint $table) {
            $table->decimal('cost', 8, 2)->nullable(); // Voeg de kostkolom toe
        });
    }

    public function down()
{
    Schema::table('ritten', function (Blueprint $table) {
        $table->dropColumn('cost');
    });
}
};
