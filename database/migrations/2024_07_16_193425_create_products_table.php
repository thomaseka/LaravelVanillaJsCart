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
            $table->id('prodId'); // Creates an auto-incrementing primary key column
            $table->string('prodName');
            $table->string('uom');
            $table->double('price')->default(0);
            $table->double('tax')->default(0); //can be delete because not being used rn
            $table->double('srv')->default(0); //can be delete because not being used rn
            $table->double('other')->default(0); //can be delete because not being used rn
            $table->string('discId'); //can be delete because not being used rn
            $table->double('cost');
            $table->tinyInteger('addCost')->default(0); //can be delete because not being used rn
            $table->double('stock')->default(1);
            $table->string('prodImagePath');
            $table->tinyInteger('isActive')->default(1);
            $table->timestamps(); // Adds created_at and updated_at columns
            $table->unsignedBigInteger('subCategoryId')->nullable();
            $table->unsignedBigInteger('categoryId')->nullable();
            $table->foreign('categoryId')->references('categoryId')->on('category');
            $table->foreign('subCategoryId')->references('subCategoryId')->on('subcategory');
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
