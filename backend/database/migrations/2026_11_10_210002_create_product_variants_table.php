<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Sellable SKU. Color/size are FKs. No stock qty or low-stock column.
     */
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('color_id')->constrained('colors')->restrictOnDelete();
            $table->foreignId('size_id')->constrained('sizes')->restrictOnDelete();
            $table->string('name', 120);
            $table->string('sku', 50)->unique();
            $table->string('barcode', 64)->nullable()->unique();
            $table->decimal('purchase_cost', 12, 2)->default(0);
            $table->decimal('selling_price', 12, 2);
            $table->string('status')->default('active');
            $table->timestamps();

            $table->unique(['product_id', 'color_id', 'size_id'], 'product_variant_unique');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
