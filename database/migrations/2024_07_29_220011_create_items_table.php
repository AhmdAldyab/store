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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_code');
            $table->integer('price_sell')->nullable();
            $table->integer('price_pay')->nullable();
            $table->integer('number_place');
            $table->date('date');
            $table->string('unit');
            $table->string('status')->default('valid');
            $table->enum('activate',['active','inactive'])->default('active');
            $table->integer('quantity');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
