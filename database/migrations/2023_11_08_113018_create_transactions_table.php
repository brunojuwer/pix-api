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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payer_institution_id');
            $table->unsignedBigInteger('reciver_institution_id');
            $table->unsignedBigInteger('payer_client_id');
            $table->unsignedBigInteger('reciver_client_id');
            $table->unsignedBigInteger('payer_key_id');
            $table->unsignedBigInteger('reciver_key_id');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
