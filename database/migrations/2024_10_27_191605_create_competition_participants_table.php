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
        Schema::create('competition_participants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->string('surname', 55);
            $table->string('phoneNumber', 15);
            $table->string('email')->unique();
            $table->string('receiptNumber', 150);
            $table->dateTime('purchaseDate')->default(date('Y-m-d h:i:s'));
            $table->string('receiptPhoto')->nullable();
            $table->boolean('statuteAcceptance')->nullable();
            $table->boolean('consentMarketingAcceptance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_participants');
    }
};
