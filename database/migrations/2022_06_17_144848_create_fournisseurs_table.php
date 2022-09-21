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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('codeFournisseur')->unique();
            $table->string('noms');
            $table->string('telephone');
            $table->string('email');
            $table->string('adresse');
            $table->string('GLFournisseur')->nullable();
            $table->unsignedBigInteger('structure_id')->nullable();
            $table->foreign('structure_id')->references('id')->on('structures')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('fournisseurs');
    }
};
