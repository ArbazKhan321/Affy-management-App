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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brandName');
            $table->string('ownerName')->nullable();
            $table->integer('numberOfCrates')->default(0);
            $table->string('company_idd')->unique();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('is_delete')->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
