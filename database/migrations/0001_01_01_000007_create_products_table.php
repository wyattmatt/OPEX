<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('barcode')->unique();
            $table->text('name');
            $table->foreignUuid('status')->nullable()->constrained('status')->onDelete('set null');
            $table->foreignUuid('type')->nullable()->constrained('types')->onDelete('set null');
            $table->foreignUuid('room')->nullable()->constrained('rooms')->onDelete('set null');
            $table->text('noted')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->foreignUuid('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('updated_at')->nullable();
            $table->foreignUuid('modified_by')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
