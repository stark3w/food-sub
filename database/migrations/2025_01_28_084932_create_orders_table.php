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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_phone')->unique();
            $table->foreignId('tariff_id')->constrained('tariffs')->onDelete('cascade');
            $table->enum('schedule_type', ['EVERY_DAY', 'EVERY_OTHER_DAY', 'EVERY_OTHER_DAY_TWICE']);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->date('first_date')->nullable();
            $table->date('last_date')->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
