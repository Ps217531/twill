<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTables extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('portfolio_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'portfolio');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('portfolio_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'portfolio');
        });

        Schema::create('portfolio_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'portfolio');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_revisions');
        Schema::dropIfExists('portfolio_translations');
        Schema::dropIfExists('portfolio_slugs');
        Schema::dropIfExists('portfolios');
    }
}
