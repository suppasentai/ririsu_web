<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('url_video')->nullable();
            $table->date('date')->nullable();
            $table->integer('page_views')->default(0);
            $table->boolean('active');
            $table->integer('user_id')->index();
            $table->string('category_ref')->nullable();
            $table->string('grade_ref')->nullable();
            $table->string('institution_ref')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('releases');
    }
}
