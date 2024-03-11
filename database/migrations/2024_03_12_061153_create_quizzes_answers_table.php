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
        Schema::create('quizzes_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('quiz_id')->constrained('quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('question_id')->constrained('questions_quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('option_id')->constrained('options_questions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('true_or_false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes_answers');
    }
};
