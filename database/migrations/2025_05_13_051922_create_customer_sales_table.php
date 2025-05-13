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
        Schema::create('customer_sales', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('branch_id');
            // $table->string('product_id');
            $table->string('sale_count');
            $table->string('price');
            $table->string('dollar');
            $table->string('afghani');
            $table->string('kaldar');
            $table->string('description');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currancies')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_sales');
    }
};
