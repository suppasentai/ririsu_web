<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleaseTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('release_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->unique(['release_id','tag_id']);
            $table->foreign('release_id')
                ->references('id')
                ->on('releases')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('release_tag');
    }
}
