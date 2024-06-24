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
        Schema::create('external_missions', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->longText('description')->nullable();
            $table->double('goal_amount')->default(0);
            $table->double('current_amount')->default(0);
            $table->timestamp('deadline')->nullable();
            $table->string('image_url')->nullable();
            $table->string('created_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_missions');
    }
};
