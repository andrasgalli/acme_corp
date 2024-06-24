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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->enum('campaign_type', ['campaign', 'external']);
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->enum('donation_type', ['onetime', 'recurring'])->default('onetime');
            $table->enum('donation_status', ['new', 'pending', 'finished'])->default('new');
            $table->double('amount')->default(0);

            $table->index(['campaign_id'], 'IX_Donation_Campaign_Id');
            $table->index(['user_id'], 'IX_Donation_User_Id');

            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_has_donations');
    }
};
