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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // タスクのタイトル
            $table->text('description')->nullable(); // タスクの詳細（空でもOK）
            $table->boolean('is_completed')->default(false); // 完了フラグ（初期値:未完了）
            $table->timestamps();
            $table->foreignId('user_id');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};