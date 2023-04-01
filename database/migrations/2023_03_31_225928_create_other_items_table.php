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
        Schema::create('other_items', function (Blueprint $table) {
            $table->id();
            $table->string('login_page_heading');
            $table->string('login_page_title')->nullable();
            $table->string('login_page_seo_description')->nullable();
            $table->string('register_page_heading');
            $table->string('register_page_title')->nullable();
            $table->string('register_page_seo_description')->nullable();
            $table->string('forget_password_page_heading');
            $table->string('forget_password_page_title')->nullable();
            $table->string('forget_password_page_seo_description')->nullable();
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
        Schema::dropIfExists('other_items');
    }
};