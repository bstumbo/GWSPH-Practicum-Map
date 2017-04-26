<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('practicums', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('title');
            $table->string('term');
            $table->string('description')->nullable();
            $table->string('site_id');
            $table->timestamps(); });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('practicums');
    }
}
