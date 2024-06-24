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
        Schema::create('user_has_favourite_campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('campaign_id');

            $table->index(['user_id'], 'IX_User_Has_Favourite_Campaigns_User_Id');
            $table->index(['campaign_id'], 'IX_User_Has_Favourite_Campaigns_Campaign_Id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_has_favourite_campaigns');
    }
};
