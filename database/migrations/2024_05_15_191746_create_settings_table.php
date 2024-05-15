<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_img');
            $table->string('string')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('live_link')->nullable();
            $table->string('sale_link')->nullable();
            $table->string('info_title');
            $table->string('info_subtitle');
            $table->text('info_desc');
            $table->string('banner_img');
            $table->string('banner_title');
            $table->string('banner_link');
            $table->string('services_home_title');
            $table->string('services_subtitle');
            $table->string('gallery_home_title');
            $table->string('gallery_subtitle');
            $table->string('news_home_title');
            $table->string('news_subtitle');
            $table->string('footer_title');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('work_time');
            $table->string('copy_write');
            $table->string('about_bg_img');
            $table->string('about_title');
            $table->text('about_old_desc');
            $table->text('about_new_desc');
            $table->string('about_old_img');
            $table->string('about_new_img');
            $table->string('services_bg_img');
            $table->string('services_title');
            $table->text('services_desc');
            $table->string('news_title');
            $table->string('news_bg_img');
            $table->string('suggestion_title');
            $table->string('suggestion_bg_img');
            $table->string('rules_title');
            $table->string('rules_bg_img');
            $table->text('rules_desc'); // text editorla
            $table->string('education_bg_img');
            $table->string('education_title');
            $table->text('education_desc');
            $table->string('breeding_title');
            $table->text('breeding_desc');
            $table->string('breeding_bg_img');
            $table->string('faq_title');
            $table->string('faq_bg_img');
            $table->string('galery_title');
            $table->string('contact_title');
            $table->string('contact_bg_img');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('marker_path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
