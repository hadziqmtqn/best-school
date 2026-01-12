<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->unsignedBigInteger('institution_id');
            $table->string('name');
            $table->string('contestant');
            $table->longText('description')->nullable();
            $table->string('organizer')->nullable();
            $table->year('year');
            $table->string('achievement_level')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('institution_id')->references('id')->on('institutions')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
