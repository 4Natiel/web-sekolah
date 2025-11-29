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
        Schema::create('extracurriculars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('pembina_id')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('jadwal')->nullable();
            $table->timestamps();

             // Relasi guru pembina
            $table->foreign('pembina_id')
                ->references('id')->on('teachers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracurriculars');
    }
};
