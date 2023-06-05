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
        Schema::create('sample_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('main_img');
            $table->string('details_client')->nullable();
            $table->string('details_date')->nullable();
            $table->string('details_url')->nullable();
            $table->string('details_title')->nullable();
            $table->text('details_txt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_projects');
    }
};
