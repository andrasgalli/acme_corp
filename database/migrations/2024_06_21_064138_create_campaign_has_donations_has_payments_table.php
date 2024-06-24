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
        Schema::create('donation_has_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donation_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_processor_id');
            $table->string('inner_transaction_id', 32)->unique();
            $table->string('payment_processor_transaction_id', 255)->nullable();
            $table->string('card_token', 255)->nullable();
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
            $table->text('transaction_result')->nullable();

            $table->index(['user_id'], 'IX_Campaign_Donation_Payments_User_Id');
            $table->index(['inner_transaction_id'], 'IX_Campaign_Donation_Payments_Inner_Transaction_Id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('donation_id', 'FK_donation_id')->references('id')->on('donations');
            $table->foreign('payment_processor_id', 'FK_camping_processor_id')->references('id')->on('payment_processors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_has_donations_has_payments');
    }
};
