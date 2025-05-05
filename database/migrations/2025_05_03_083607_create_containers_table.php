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
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('company_id');
            $table->string('item_count');
            $table->string('price');
            $table->string('total_purchase_price');
            $table->text('description');
            $table->timestamps();
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('company_id')->references('id')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('containers');
    }
};
