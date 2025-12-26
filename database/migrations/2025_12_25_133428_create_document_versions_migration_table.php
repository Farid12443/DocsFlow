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
        Schema::create('tb_document_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('tb_documents', 'id')->onDelete('cascade');
            $table->string('versi');
            $table->string('file_path');
            $table->text('catatan_perubahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_document_versions');
    }
};
