<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->unsignedBigInteger('educational_level_id');
            $table->string('npsn')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('village')->nullable();
            $table->string('street')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('educational_level_id')->references('id')->on('educational_levels')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
