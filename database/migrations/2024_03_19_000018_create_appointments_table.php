<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('time');
            $table->string('title')->nullable();
            $table->longText('notes')->nullable();
            $table->string('finish_code')->nullable();
            $table->string('status')->nullable();
            $table->longText('reject_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
