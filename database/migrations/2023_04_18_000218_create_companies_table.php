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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('preview');
            $table->string('name');
            $table->unsignedBigInteger('profession_id');
            $table->integer('min_wages');
            $table->integer('max_wages')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->string('address');
            $table->unsignedBigInteger('experience_id');
            $table->string('description');
            $table->unsignedBigInteger('type_of_employment_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('author_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->index('city_id', 'city_idx');
            $table->foreign('city_id', 'city_fk')->on('cities')->references('id');

            $table->index('profession_id', 'profession_idx');
            $table->foreign('profession_id', 'profession_company_fk')->on('professions')->references('id');

            $table->index('experience_id', 'experience_idx');
            $table->foreign('experience_id', 'experience_fk')->on('experiences')->references('id');

            $table->index('type_of_employment_id', 'type_of_employment_idx');
            $table->foreign('type_of_employment_id', 'type_of_employment_fk')->on('employments')->references('id');

            $table->index('schedule_id', 'schedule_idx');
            $table->foreign('schedule_id', 'schedule_fk')->on('schedules')->references('id');

            $table->index('author_id', 'author_idx');
            $table->foreign('author_id', 'author_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
