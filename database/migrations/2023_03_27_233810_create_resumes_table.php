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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profession_id');
            $table->integer('wage');
            $table->text('description');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('experience_id');
            $table->unsignedBigInteger('type_of_employment_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('author_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->index('city_id', 'resume_city_idx');
            $table->foreign('city_id', 'resume_city_fk')->on('cities')->references('id');

            $table->index('experience_id', 'resume_experience_idx');
            $table->foreign('experience_id', 'resume_experience_fk')->on('experiences')->references('id');

            $table->index('author_id', 'resume_author_idx');
            $table->foreign('author_id', 'resume_author_fk')->on('users')->references('id');

            $table->index('profession_id', 'resume_profession_idx');
            $table->foreign('profession_id', 'resume_profession_fk')->on('professions')->references('id');

            $table->index('type_of_employment_id', 'resume_type_of_employment_idx');
            $table->foreign('type_of_employment_id', 'resume_type_of_employment_fk')->on('employments')->references('id');

            $table->index('schedule_id', 'resume_schedule_idx');
            $table->foreign('schedule_id', 'resume_schedule_fk')->on('schedules')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
