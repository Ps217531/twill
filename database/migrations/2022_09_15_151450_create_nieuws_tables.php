<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNieuwsTables extends Migration
{
    public function up()
    {
        Schema::create('nieuws', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('nieuw_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'nieuw');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('nieuw_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'nieuw');
        });

        Schema::create('nieuw_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'nieuw');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nieuw_revisions');
        Schema::dropIfExists('nieuw_translations');
        Schema::dropIfExists('nieuw_slugs');
        Schema::dropIfExists('nieuws');
    }
}
