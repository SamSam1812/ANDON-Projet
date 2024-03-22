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
        Schema::create('info', function (Blueprint $table) {
            $table->id('id_info');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('robot_id');
            $table->integer('NbPieceDebutMachine');
            $table->integer('NbPieceFinMachine');
            $table->boolean('TopPiece');
            $table->boolean('BP_Andon');
            $table->integer('NbRebus');
            $table->integer('NiveauAppelAndon');
            $table->timestamps();
        });

        Schema::create('robots', function (Blueprint $table) {
            $table->id('id_robot');
            $table->string('name_robot');
            $table->string('ip_robot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info');
        Schema::dropIfExists('robots');
    }
};
