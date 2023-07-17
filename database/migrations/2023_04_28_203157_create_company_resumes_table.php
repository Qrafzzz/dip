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
        Schema::create('company_resumes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('resume_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('status_id');
            $table->index('company_id', 'company_resume_company_idx');
            $table->index('resume_id', 'company_resume_resume_idx');

            $table->foreign('company_id', 'company_resume_company_fk')->on('companies')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('resume_id', 'company_resume_resume_fk')->on('resumes')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_resumes');
    }
};
