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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->longText('description')->nullable();
            $table->double('goal_amount')->default(0);
            $table->timestamp('deadline')->nullable();
            $table->enum('status', ['idle', 'running', 'success', 'failed'])->default('idle');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_featured')->default(false);
            $table->string('image_url')->nullable();

            $table->index(['user_id'], 'IX_Campaigns_User_Id');

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign');
    }
};
