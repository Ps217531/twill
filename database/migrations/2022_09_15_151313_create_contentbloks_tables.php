<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentbloksTables extends Migration
{
    public function up()
    {
        Schema::create('contentbloks', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('contentblok_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'contentblok');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('contentblok_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'contentblok');
        });

        Schema::create('contentblok_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'contentblok');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contentblok_revisions');
        Schema::dropIfExists('contentblok_translations');
        Schema::dropIfExists('contentblok_slugs');
        Schema::dropIfExists('contentbloks');
    }
}
