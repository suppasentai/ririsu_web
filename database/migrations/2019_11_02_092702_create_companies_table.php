<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('representative_name');
            $table->date('incorp_date')->nullable();
            $table->string('location');
            $table->string('tel');
            $table->string('identification_code');
            $table->bigInteger('capital_stock')->nullable();
            $table->integer('employees_number')->nullable();
            $table->string('url')->nullable();
            $table->string('email');
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
        Schema::dropIfExists('companies');
    }
}
