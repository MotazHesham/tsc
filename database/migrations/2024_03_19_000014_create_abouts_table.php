<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->longText('address')->nullable();
            $table->longText('description')->nullable();
            $table->longText('footer_description')->nullable();
            $table->string('how_do_we_work_video')->nullable();
            $table->string('count_experience')->nullable();
            $table->string('count_projects')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
