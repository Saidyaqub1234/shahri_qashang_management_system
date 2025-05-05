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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("lastName");
            $table->string("fatherName");
            $table->string("phone");
            $table->string("whats_app");
            $table->string("image");
            $table->string("dollor_amount");
            $table->string("afghani_amount");
            $table->string("kaldar_amount");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
