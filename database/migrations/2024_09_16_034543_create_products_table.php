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
            $table->foreignId('category_id')->constrained('categories')->casecodeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->casecodeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->json('image')->nullable();
            $table->longtext('description')->nullable();
            $table->decimal('price',10,2);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('in_stock')->default('false');
            $table->string('on_sale')->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::drop('products');
}
};
