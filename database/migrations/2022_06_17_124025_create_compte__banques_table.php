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
        Schema::create('compte__banques', function (Blueprint $table) {
            $table->id();
            $table->string('numeroCompte')->unique();
            $table->unsignedBigInteger('codeBanque');
            $table->foreign('codeBanque')->references('id')->on('banques')->onUpdate('cascade')->onDelete('cascade');
            $table->string('designation');
            $table->string('agence');
            $table->double('solde')->nullable();
            $table->unsignedBigInteger('structure_id');
            $table->foreign('structure_id')->references('id')->on('structures')->onUpdate('cascade')->onDelete('cascade');
            $table->string('GLCompteBanque')->nullable();
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
        Schema::dropIfExists('compte__banques');
    }
};
