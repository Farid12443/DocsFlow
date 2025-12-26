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
        Schema::create('tb_document_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('tb_documents', 'id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('tb_users', 'id')->onDelete('cascade');
            $table->enum('permission', ['view', 'edit', 'download']);
            $table->unique(['document_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_document_access');
    }
};
