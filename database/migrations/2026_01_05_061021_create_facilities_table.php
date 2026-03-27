<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->year('construction_year')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('institution_id')->references('id')->on('institutions')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
