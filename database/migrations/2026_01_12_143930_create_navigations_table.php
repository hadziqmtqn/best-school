<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->integer('serial_number');
            $table->string('category')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->string('url')->nullable();
            $table->boolean('open_new_tab')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on('posts')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('navigations');
    }
};
