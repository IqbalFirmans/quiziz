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
        Schema::create('options_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->references('id')->on('quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('question_id')->references('id')->on('questions_quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('option');
            $table->boolean('true_or_false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options_questions');
    }
};
