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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->string('codeVente')->nullable();
            $table->dateTime('dateVente');
            $table->double('montantTotal');
            $table->unsignedBigInteger('codeClient')->nullable();
            $table->foreign('codeClient')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ventes');
    }
};
