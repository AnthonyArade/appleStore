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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // relation avec la table category contraintes sur les categories sur l'action delete
            // category -> model / categories -> base de données
            $table->foreignId('category_id')
            ->constrained('categories')
            ->onDelete('cascade');
            $table->string('name');
            // -nullable() autorise le champ d'etre null
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            // ->default() attribue une valeur par defaut
            $table->boolean('new')->default(FALSE);
            $table->float('price',10,2);
            $table->text('color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
