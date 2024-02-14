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
        Schema::create('s_m_s_models', function (Blueprint $table) {
            $table->id();
            $table->string('sms_body');
            $table->string('receiver_number');
            $table->string('response');
            $table->string('sms_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_m_s_models');
    }
};
