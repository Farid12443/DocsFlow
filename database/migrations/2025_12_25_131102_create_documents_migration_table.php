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
        Schema::create('tb_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('tb_users', 'id')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('tb_categories', 'id')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->enum('file_type', ['pdf', 'docx', 'xlsx', 'jpg', 'png']);
            $table->string('file_path');
            $table->enum('status', ['aktif', 'arsip']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_documents');
    }
};
