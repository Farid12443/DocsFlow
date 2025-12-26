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
        Schema::create('tb_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('tb_users', 'id')->onDelete('cascade');
            $table->foreignId('document_id')->nullable()->constrained('tb_documents')->onDelete('set null');
            $table->string('keterangan')->nullable();
            $table->enum('aksi', ['upload', 'edit', 'delete', 'download']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_activity_logs');
    }
};
