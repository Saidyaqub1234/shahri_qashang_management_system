<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branchstores', function (Blueprint $table) {
               $table->id();
                $table->unsignedBigInteger('product_id');
                $table->unsignedBigInteger('branch_id');

                $table->unsignedBigInteger('company_id');
                $table->string('product_in_count');
                $table->string('price');
                $table->string('total_price');
                $table->date('date');
                $table->text('description')->nullable();
                $table->timestamps();
                // Foreign Keys
                $table->foreign('product_id')->references('id')->on('product_types')->onDelete('cascade');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branchstores');
    }
};
