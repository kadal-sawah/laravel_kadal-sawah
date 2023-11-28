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
        Schema::create('rs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rs');
            $table->longText('alamat');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->timestamps();
            $table->foreign('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rs');
    }
};