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
        Schema::create('url_shorter_click_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('url_shorter_id')->nullable(false)->index();
            $table->timestamps();

            $table
                ->foreign('url_shorter_id')
                ->references('id')
                ->on('url_shorters')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_shorter_click_logs');
    }
};
