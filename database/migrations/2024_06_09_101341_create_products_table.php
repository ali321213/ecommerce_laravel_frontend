<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();

            $table->foreignId('brand_id')
                ->constrained('brands')
                ->cascadeOnDelete();

            $table->foreignId('unit_id')
                ->nullable()
                ->constrained('units')
                ->nullOnDelete();

            // Core Product Info
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->json('images')->nullable();

            // Descriptions
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();

            // Pricing & Inventory
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('in_stock')->default(0);
            $table->boolean('on_sale')->default(false);

            // Status Flags
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

            // SEO Fields
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords')->nullable();

            // Timestamps & Soft Deletes
            $table->timestamps();
            $table->softDeletes();

            // Indexes for Performance
            $table->index(['category_id', 'brand_id']);
            $table->index('is_active');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
