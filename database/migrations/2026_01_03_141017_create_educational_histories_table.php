<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('educational_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('educational_level_id');
            $table->string('institution_name');
            $table->string('major')->nullable();
            $table->year('graduation_year');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('educational_level_id')->references('id')->on('educational_levels')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educational_histories');
    }
};
