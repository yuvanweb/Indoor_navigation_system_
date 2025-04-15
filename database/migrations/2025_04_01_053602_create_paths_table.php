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
        Schema::create('paths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('map_id');
            $table->unsignedBigInteger('start_shop_id');
            $table->unsignedBigInteger('end_shop_id');
            $table->text('path_data'); // JSON encoded path data
            $table->foreign('map_id')->references('id')->on('maps')->onDelete('cascade');
            $table->foreign('start_shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('end_shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paths');
    }
};
