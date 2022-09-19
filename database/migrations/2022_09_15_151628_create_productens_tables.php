<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductensTables extends Migration
{
    public function up()
    {
        Schema::create('productens', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('producten_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'producten');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('producten_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'producten');
        });

        Schema::create('producten_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'producten');
        });
    }

    public function down()
    {
        Schema::dropIfExists('producten_revisions');
        Schema::dropIfExists('producten_translations');
        Schema::dropIfExists('producten_slugs');
        Schema::dropIfExists('productens');
    }
}
