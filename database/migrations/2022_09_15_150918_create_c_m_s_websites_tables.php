<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSWebsitesTables extends Migration
{
    public function up()
    {
        Schema::create('c_m_s_websites', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('c_m_s_website_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'c_m_s_website');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('c_m_s_website_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'c_m_s_website');
        });

        Schema::create('c_m_s_website_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'c_m_s_website');
        });
    }

    public function down()
    {
        Schema::dropIfExists('c_m_s_website_revisions');
        Schema::dropIfExists('c_m_s_website_translations');
        Schema::dropIfExists('c_m_s_website_slugs');
        Schema::dropIfExists('c_m_s_websites');
    }
}
