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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('email')->nullable();
            $table->String('phone')->nullable();
            $table->String('website')->nullable();
            $table->String('logo')->nullable();
            $table->String('address')->nullable();
            $table->String('status')->default('active');
            $table->integer('total_users')->default(1);
            $table->time('clock_in_time')->default('09:00:00');
            $table->time('clock_out_time')->default('18:00:00');
            $table->integer('early_clock_in_time')->nullable();
            $table->integer('allow_clock_out_till')->nullable();
            $table->boolean('self_clocking')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
