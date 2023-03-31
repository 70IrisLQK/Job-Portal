<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('days');
            $table->string('display_time', 100);
            $table->tinyInteger('total_allowed_job')->default(0);
            $table->tinyInteger('total_allowed_featured_jobs')->default(0);
            $table->tinyInteger('total_allowed_photos')->default(0);
            $table->tinyInteger('total_allowed_videos')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};