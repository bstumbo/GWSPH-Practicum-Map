<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramsToPracticums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('practicums', function (Blueprint $table) {
            $table->string('major')->nullable();
            $table->foreign('major')->references('program')->on('programs');
            $table->string('program_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('practicums', function (Blueprint $table) {
             $table->dropColumn('major');
             $table->dropColumn('program_link');
        });
    }
}
