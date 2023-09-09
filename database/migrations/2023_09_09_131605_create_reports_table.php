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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('matter_id')->unsigned();
            $table->foreign('matter_id')->references('id')->on('matters')->onDelete('cascade');
            $table->string('description');
            $table->datetime('start');
            $table->datetime('end');
            $table->integer('status');
            $table->integer('category');
            $table->string('product_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
