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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->text('description');
            $table->integer('balance')->default(0);
            $table->mediumText('image')->nullable();
            $table->float('rating')->default(0);
            $table->string('address');
            $table->string('street');
            $table->string('province');
            $table->string('city');
            $table->string('subdistrict');
            $table->integer('postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
