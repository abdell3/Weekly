<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->unique();
            $table->text('description');
            $table->text('image');
            $table->string('slug')->unique();
            $table->decimal('prix', 10, 2);
            $table->enum('status', ['actif', 'brouillon', 'archive'])->default('brouillon');
            $table->foreignId('category_name')->constrained(table: 'categories', indexName: 'announcement_category_name');
            $table->foreignId('users_nom')->constrained(table: 'users', indexName: 'announcements_users_nom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
