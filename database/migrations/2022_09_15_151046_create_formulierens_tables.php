<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulierensTables extends Migration
{
    public function up()
    {
        Schema::create('formulierens', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('formulieren_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'formulieren');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('formulieren_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'formulieren');
        });

        Schema::create('formulieren_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'formulieren');
        });
    }

    public function down()
    {
        Schema::dropIfExists('formulieren_revisions');
        Schema::dropIfExists('formulieren_translations');
        Schema::dropIfExists('formulieren_slugs');
        Schema::dropIfExists('formulierens');
    }
}
