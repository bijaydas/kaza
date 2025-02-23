<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('login_sessions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('session_id');

            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();

            $table->dateTime('login_at')->useCurrent();
            $table->dateTime('logout_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_sessions');
    }
};
