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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('designation');
            $table->integer('quantite')->default(0);
            $table->string('codeMonnaie')->nullable();
            $table->float('prixUnitaire', 8, 2);
            $table->integer('stockAlerte');
            $table->unsignedBigInteger('codeCategorie');
            $table->foreign('codeCategorie')->references('id')->on('categorie_articles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('GLArticle')->nullable();
            $table->string('GLChargeArticle')->nullable();
            $table->string('GLProduitArticle')->nullable();
            $table->string('GLStockArticle')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
