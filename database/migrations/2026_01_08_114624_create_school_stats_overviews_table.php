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
        Schema::create('school_stats_overviews', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->unsignedBigInteger('school_year_id');
            $table->unsignedBigInteger('institution_id');
            $table->integer('number_of_teachers');
            $table->integer('number_of_students');
            $table->integer('number_of_classrooms');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('school_year_id')->references('id')->on('school_years')->cascadeOnDelete();
            $table->foreign('institution_id')->references('id')->on('institutions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_stats_overviews');
    }
};
