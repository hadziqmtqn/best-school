<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('homebases', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('institution_id');
            $table->date('appointment_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('institution_id')->references('id')->on('institutions')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homebases');
    }
};
