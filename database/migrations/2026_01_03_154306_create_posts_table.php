<?php

use App\Enums\PostType;
use App\Enums\PostVisibility;
use App\Enums\StatusData;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->enum('type', array_keys(PostType::options()));
            $table->longText('content');
            $table->unsignedBigInteger('post_category_id')->nullable();
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->enum('status', array_keys(StatusData::options(['published', 'draft', 'pending_review'])));
            $table->enum('visibility', array_keys(PostVisibility::options()));
            $table->string('password')->nullable();
            $table->boolean('allow_comment')->default(false);
            $table->json('tags')->nullable();
            $table->text('unsplash_url')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_category_id')->references('id')->on('post_categories')->nullOnDelete();
            $table->foreign('institution_id')->references('id')->on('institutions')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('reviewed_by')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
