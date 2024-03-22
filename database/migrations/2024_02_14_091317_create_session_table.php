<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('nbr_operateur');
            $table->integer('nbr_palette');
            $table->integer('nbr_contenant');
            $table->integer('nbr_cartons');
            $table->time('estimatedTime');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session');
    }
};
