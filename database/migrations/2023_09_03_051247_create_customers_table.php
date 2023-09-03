<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('kana_name')->nullable();
            $table->string('address');
            $table->double('lat', 9, 6);
            $table->double('lng', 9, 6);
            $table->string('mail_address')->nullabel();
            $table->string('phone_number')->nullable();
            $table->string('key_person');
            $table->string('memo')->nullable();
            $table->string('img_path')->nullable();
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
