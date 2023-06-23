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
        Schema::create('page_prices', function (Blueprint $table) {
            $table->id();
            $table->string('paper_type');
            $table->unsignedBigInteger('paper_price');
            $table->boolean('show_on_hompage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_prices');
    }
};
