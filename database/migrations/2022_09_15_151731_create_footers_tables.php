<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTables extends Migration
{
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('footer_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'footer');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('footer_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'footer');
        });

        Schema::create('footer_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'footer');
        });
    }

    public function down()
    {
        Schema::dropIfExists('footer_revisions');
        Schema::dropIfExists('footer_translations');
        Schema::dropIfExists('footer_slugs');
        Schema::dropIfExists('footers');
    }
}
