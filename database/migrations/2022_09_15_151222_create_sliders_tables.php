<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTables extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('slider_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'slider');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('slider_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'slider');
        });

        Schema::create('slider_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'slider');
        });
    }

    public function down()
    {
        Schema::dropIfExists('slider_revisions');
        Schema::dropIfExists('slider_translations');
        Schema::dropIfExists('slider_slugs');
        Schema::dropIfExists('sliders');
    }
}
