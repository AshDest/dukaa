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
        Schema::create('detail_approvisionnements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAppro');
            $table->foreign('idAppro')->references('id')->on('approvisionnements')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idArticle');
            $table->foreign('idArticle')->references('id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantite');
            $table->double('prix_achat');
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
        Schema::dropIfExists('detail_approvisionnements');
    }
};
