<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('number_of_students', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->unsignedBigInteger('employee_position_id');
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('rombel_id')->nullable();
            $table->integer('amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_position_id')->references('id')->on('employee_positions')->cascadeOnDelete();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreign('rombel_id')->references('id')->on('rombels')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('number_of_students');
    }
};
