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
        Schema::create('detail_ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idVente');
            $table->foreign('idVente')->references('id')->on('ventes')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantite');
            $table->double('montant');
            $table->unsignedBigInteger('idArticle');
            $table->foreign('idArticle')->references('id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('detail_ventes');
    }
};
