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
        Schema::create('detail_imgs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sample_project_id');
            $table->string('img');
            $table->timestamps();
            $table->foreign('sample_project_id')
                ->references('id')
                ->on('sample_projects')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_imgs');
    }
};
