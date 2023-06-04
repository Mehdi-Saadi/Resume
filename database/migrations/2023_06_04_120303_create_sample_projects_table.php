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
            $table->string('details_client');
            $table->string('details_date');
            $table->string('details_url');
            $table->string('details_title');
            $table->text('details_txt');
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
