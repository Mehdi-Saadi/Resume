<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('background_img');
            $table->string('name');
            $table->string('iam');
            $table->text('about_txt');
            $table->string('about_img');
            $table->string('about_title');
            $table->string('birthday');
            $table->integer('age');
            $table->string('phone');
            $table->string('degree');
            $table->string('email');
            $table->boolean('available');
            $table->string('location');
            $table->text('facts_txt')->nullable();
            $table->integer('clients');
            $table->integer('projects_done');
            $table->integer('awards');
            $table->text('skills_txt')->nullable();
            $table->text('resume_txt')->nullable();
            $table->text('last_words')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
