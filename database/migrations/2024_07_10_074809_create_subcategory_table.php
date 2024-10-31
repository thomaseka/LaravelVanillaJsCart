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
        Schema::create('subcategory', function (Blueprint $table) {
            $table->id('subCategoryId');
            $table->string('subCategoryName', 20);
            $table->string('subCategoryImagePath', 255)->nullable();
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('categoryId')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategory');
    }
};
