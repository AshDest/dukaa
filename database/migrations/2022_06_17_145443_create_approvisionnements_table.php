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
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->id();
            $table->string('codeAprro')->unique();
            $table->dateTime('dateAppro');
            $table->unsignedBigInteger('codeFournisseur');
            $table->foreign('codeFournisseur')->references('id')->on('fournisseurs')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('structure_id');
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
        Schema::dropIfExists('approvisionnements');
    }
};
