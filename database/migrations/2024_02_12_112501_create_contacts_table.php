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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->foreignId('upazila_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('union_id')->constrained()->onDelete('cascade')->nullable();
            $table->integer('ward_id')->nullable();
            $table->string('name');
            $table->string('bangla_name')->nullable();
            $table->string('contact_number_1')->unique();
            $table->string('contact_number_2')->nullable();
            $table->text('address')->nullable();
            $table->string('profession')->nullable();
            $table->string('category_id')->nullable();
            $table->foreignId('batch_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('s_s_c_batch_id')->nullable();

            $table->foreign('s_s_c_batch_id')->references('id')->on('s_s_c__batches')->onDelete('cascade')->nullable();

            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
