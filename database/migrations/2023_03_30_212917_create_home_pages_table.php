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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30)->nullable();
            $table->string('short_title', 100)->nullable();
            $table->string('job_title', 30)->nullable();
            $table->string('job_category', 30)->nullable();
            $table->string('job_location', 30)->nullable();
            $table->string('search', 30)->nullable();
            $table->string('background')->nullable();
            $table->string('status')->default(0);
            $table->string('job_category_title', 30)->nullable();
            $table->string('job_category_short_title', 100);
            $table->tinyInteger('job_category_status')->default(0);
            $table->string('why_choose_title', 30);
            $table->string('why_choose_short_title', 100);
            $table->string('why_choose_bg');
            $table->string('why_choose_status')->default(0);
            $table->string('feature_job_title', 30);
            $table->string('feature_job_short_title', 100);
            $table->tinyInteger('feature_job_status')->default(0);
            $table->string('testimonial_title', 30);
            $table->string('testimonial_bg');
            $table->tinyInteger('testimonial_status')->default(0);
            $table->string('latest_news_title', 30);
            $table->string('latest_news_short_title', 100);
            $table->tinyInteger('latest_news_status')->default(0);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
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
        Schema::dropIfExists('home_pages');
    }
};